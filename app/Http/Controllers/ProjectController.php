<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\DataLayerAdd;
use App\Models\DataLayerEdit;
use App\Models\DataLayerDelete;
use Illuminate\Support\Facades\Redirect;

/**
 * Handles the logic for managing projects in the application.
 *
 * The ProjectController class provides methods for listing, creating, updating, and deleting projects.
 * It interacts with the DataLayer, DataLayerAdd, DataLayerEdit, and DataLayerDelete models to perform
 * the necessary data operations.
 *
 * The index method retrieves a list of projects and thumbnails to display on the projects page.
 * The store method handles the creation of a new projects, storing the project details in the database.
 * The update method updates an existing projects with the provided data.
 * The destroy method deletes an project from the database.
 * The edit method retrieves an project by its ID and returns the view for editing the projects.
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dl = new DataLayer();
        $projects = $dl->listProjects();
        $img = $dl->listThumbnail();
        return view('project')->with('projects_list',$projects)->with('thumbnail_list',$img);
    }

    public function create(){
        return view('insert')->with('title', 'Project');
    }

    public function show(string $id){
        $dl = new DataLayer();

        $obj = $dl->findProjectById($id);
        $type = "project";
        $layout = $obj->layout;

        $images = $dl->listAllImages($id, $type);
        
        return view('text')
                ->with('object', $obj)
                ->with('layout', $layout)
                ->with('type', $type)
                ->with('images', $images);
    }

    public function destroy(string $id)
    { 
        $dl = new DataLayerDelete();
        $dl->deleteProject($id);
        return Redirect::to(route('panel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dl = new DataLayerAdd();

        $dl->addProject(
            $request->input('title'),
            $request->input('description'),
            $request->date('date'),
            $request->input('team'),
            $request->input('active'),
            $request->input('layout'),
            $request->file('thumbnail'),
            $request->file('top'),
            $request->file('image'),
        );

        return Redirect::route('panel');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dl = new DataLayerEdit();
        $dl->editProject(
            $id,
            $request->input('title'),
            $request->input('description'),
            $request->date('date'),
            $request->input('team'),
            $request->input('active'),
            $request->input('layout'),
            $request->file('thumbnail'),
            $request->file('top'),
            $request->file('image'),
        );
        return Redirect::route('panel');
    }

    public function edit(string $id)
    {
        $dl = new DataLayer();
        $project = $dl->findProjectById($id);

        if ($project !== null) {
            return view('edit')->with('obj', $project)->with('title', "Project")->with('type', "project");
        } else {
            return view('errors.404');
        }
    }

    

}
