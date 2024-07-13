<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\DataLayerAdd;
use App\Models\DataLayerEdit;
use App\Models\DataLayerDelete;
use Illuminate\Support\Facades\Redirect;

/**
 * Handles the logic for managing news in the application.
 *
 * The NewsController class provides methods for listing, creating, updating, and deleting news.
 * It interacts with the DataLayer, DataLayerAdd, DataLayerEdit, and DataLayerDelete models to perform
 * the necessary data operations.
 *
 * The index method retrieves a list of news and thumbnails to display on the news page.
 * The store method handles the creation of a new news, storing the news details in the database.
 * The update method updates an existing news with the provided data.
 * The destroy method deletes an news from the database.
 * The edit method retrieves an news by its ID and returns the view for editing the news.
 */
class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dl = new DataLayer();
        $news = $dl->listNews();
        $img = $dl->listThumbnail();
        return view('news')->with('news_list',$news)->with('thumbnail_list',$img);
    }

    public function create(){
        return view('insert')->with('title', 'News');
    }

    public function show(string $id){
        $dl = new DataLayer();

        $obj = $dl->findNewsById($id);
        $type = "news";
        $layout = $obj->layout;

        $images = $dl->listAllImages($id, $type);
        
        return view('text')
                ->with('object', $obj)
                ->with('layout', $layout)
                ->with('type', $type)
                ->with('images', $images);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dl = new DataLayerAdd();

        $dl->addNews(
            $request->input('title'),
            $request->input('description'),
            $request->input('date'),
            $request->input('author'),
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

        $dl->editNews(
            $id,
            $request->input('title'),
            $request->input('description'),
            $request->input('date'),
            $request->input('author'),
            $request->input('layout'),
            $request->file('thumbnail'),
            $request->file('top'),
            $request->file('image'),
        );

        return Redirect::route('panel');
    }

    public function destroy(string $id)
    { 
        $dl = new DataLayerDelete();
        $dl->deleteNews($id);
        return Redirect::to(route('panel'));
    }

    public function edit(string $id)
    {
        $dl = new DataLayer();
        $news = $dl->findNewsById($id);

        if ($news !== null) {
            return view('edit')->with('obj', $news)->with('title', "News")->with('type', "news");
        } else {
            return view('errors.404');
        }
    }
}
