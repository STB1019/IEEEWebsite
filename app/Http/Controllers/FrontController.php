<?php

namespace App\Http\Controllers;
use App\Models\DataLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/**
 * Provides various controller actions for the front-end of the application.
 *
 * The FrontController class handles the routing and rendering of views for the
 * public-facing pages of the application, such as the home page, about page,
 * members page, and error pages.
 */
class FrontController extends Controller
{
    //Returns the home page
    public function getHome()
    {
        $dl = new DataLayer();
        return view('index')
        ->with('n_project', $dl->listProjects()->count())
        ->with('n_members', $dl->listUsersOrderedByName()->count());
    }

    public function getAbout()
    {
        $dl = new DataLayer();
        return view('about')
        ->with('n_project', $dl->listProjects()->count())
        ->with('n_members', $dl->listUsersOrderedByName()->count());;
    }

    public function getPanel()
    {
        $dl = new DataLayer();
        return view('panel')
                ->with('n_project', $dl->listProjects()->count())
                ->with('n_event', $dl->listEvents()->count())
                ->with('n_news', $dl->listNews()->count())
                ->with('n_members', $dl->listUsersOrderedByName()->count())
                ->with('n_members_act', $dl->listUsersActive()->count())
                ->with('n_image', $dl->listImages()->count());
    }

    public function getFaq()
    {
        return view('faq');
    }

    public function getMembers()
    {
        $dl = new DataLayer();
        return view('members')->with('members_list', $dl->listUsersOrderedByName());
    }

    public function getText(string $id, string $layout, string $type)
    {
        $dl = new DataLayer();
        if($type == 'project')
            $obj = $dl->findProjectById($id);
        else if(str_contains($type, 'event'))
            $obj = $dl->findEventById($id);
        else
            $obj = $dl->findNewsById($id);

        $images = $dl->listAllImages($id, $type);
        return view('text')
                ->with('object', $obj)
                ->with('layout', $layout)
                ->with('type', $type)
                ->with('images', $images);
    }

    public function notFound() 
    { 
        return view('errors.404')
                ->with('error_code','404')
                ->with('error_desc_1','Page Not Found')
                ->with('error_desc_2',"We're sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?");
    }

}
