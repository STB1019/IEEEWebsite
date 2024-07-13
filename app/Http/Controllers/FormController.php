<?php

namespace App\Http\Controllers;
use App\Models\DataLayer;
use Illuminate\Http\Request;

/**
 * Provides methods for various forms related to projects, news, events, and users.
 *
 * The FormController class handles the forms for creating, editing, and deleting
 * projects, news, events, and user records. It uses the DataLayer class to retrieve
 * the necessary data for populating the forms.
 */
class FormController extends Controller
{

    //Edit forms lists

    public function getProjectEditListForm()
    {
        $dl = new DataLayer();
        return view('edit_list')->with('title', 'Project')->with('pages', $dl->listProjects());;
    }

    public function getEventEditListForm()
    {
        $dl = new DataLayer();
        return view('edit_list')->with('title', 'Event')->with('pages', $dl->listEvents());;
    }

    public function getNewsEditListForm()
    {
        $dl = new DataLayer();
        return view('edit_list')->with('title', 'News')->with('pages', $dl->listNews());;
    }

    public function getUserEditListForm()
    {
        $dl = new DataLayer();
        return view('edit_list')->with('title', 'User')->with('pages', $dl->listUsers());;
    }

    //Delete forms lists
    public function getProjectDeleteListForm()
    {
        $dl = new DataLayer();
        return view('delete')
                ->with('title', 'Project')
                ->with('objs', $dl->listProjects());
    }

    public function getEventDeleteListForm()
    {
        $dl = new DataLayer();
        return view('delete')
                ->with('title', 'Event')
                ->with('objs', $dl->listEvents());
    }

    public function getNewsDeleteListForm()
    {
        $dl = new DataLayer();
        return view('delete')
                ->with('title', 'News')
                ->with('objs', $dl->listNews());
    }

    public function getUserDeleteListForm()
    {
        $dl = new DataLayer();
        return view('delete')
                ->with('title', 'User')
                ->with('objs', $dl->listUsersWithoutCaller($_SESSION['loggedID']));
    }

}
