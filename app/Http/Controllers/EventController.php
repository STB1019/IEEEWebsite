<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\DataLayerAdd;
use App\Models\DataLayerEdit;
use App\Models\DataLayerDelete;
use Illuminate\Support\Facades\Redirect;

/**
 * Handles the logic for managing events in the application.
 *
 * The EventController class provides methods for listing, creating, updating, and deleting events.
 * It interacts with the DataLayer, DataLayerAdd, DataLayerEdit, and DataLayerDelete models to perform
 * the necessary data operations.
 *
 * The index method retrieves a list of events and thumbnails to display on the events page.
 * The store method handles the creation of a new event, storing the event details in the database.
 * The update method updates an existing event with the provided data.
 * The destroy method deletes an event from the database.
 * The edit method retrieves an event by its ID and returns the view for editing the event.
 */
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dl = new DataLayer();
        $events = $dl->listEvents();
        $img = $dl->listThumbnail();
        return view('events')->with('events_list',$events)->with('thumbnail_list',$img);
    }

    public function create(){
        return view('insert')->with('title', 'Event');
    }

    public function show(string $id){
        $dl = new DataLayer();

        $obj = $dl->findEventById($id);
        $type = "event";
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

        $dl->addEvent(
            $request->input('title'),
            $request->input('description'),
            $request->input('date1'),
            $request->input('date2'),
            $request->input('layout'),
            $request->file('thumbnail'),
            $request->file('top'),
            $request->file('image')
        );

        return Redirect::route('panel');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dl = new DataLayerEdit();

        $dl->editEvent(
            $id,
            $request->input('title'),
            $request->input('description'),
            $request->input('date1'),
            $request->input('date2'),
            $request->input('layout'),
            $request->file('thumbnail'),
            $request->file('top'),
            $request->file('image')
        );

        return Redirect::route('panel');
    }

    public function destroy(string $id)
    { 
        $dl = new DataLayerDelete();
        $dl->deleteEvent($id);
        return Redirect::to(route('panel'));
    }

    public function edit(string $id)
    {
        $dl = new DataLayer();
        $event = $dl->findEventById($id);

        if ($event !== null) {
            return view('edit')->with('obj', $event)->with('title', "Event")->with('type', "event");
        } else {
            return view('errors.404');
        }
    }
}