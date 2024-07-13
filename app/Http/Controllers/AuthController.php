<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\DataLayerAdd;
use Illuminate\Support\Facades\Redirect;

/**
 * Handles authentication-related functionality for the website.
 * 
 * This controller provides methods for user login, registration, and logout.
 * It also includes a method to check if an email already exists in the database (AJAX based).
 */
class AuthController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getLogin()
    {
        return view('login');
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function getRegistration()
    {
        return view('register');
    }

    /**
     * Register a new user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registration(Request $request)
    {
        $dl = new DataLayerAdd();
        
        $dl->addUser($request->input('username'), $request->input('password'), $request->input('email'));
       
        return Redirect::to(route('login'));
    }

    /**
     * Authenticate a user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $dl = new DataLayer();
        if($dl->validUser($request->input('email'), $request->input('password')))
        {
            $_SESSION['logged'] = true;
            $_SESSION['loggedID'] = $dl->getUserID($request->input('email'));
            $_SESSION['loggedName'] = $dl->getUserName($request->input('email'));
            $_SESSION['role'] = $dl->getUserRole($request->input('email'));
            return Redirect::to(route('home'));
        } else 
        {
            return response()->view('errors.404',['error_code' => '400','error_desc_1' => 'Password or email is incorrect!','error_desc_2' => 'Please try again!']);
        }
    }

    /**
     * Log out the authenticated user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        session_destroy();
        return Redirect::to(route('home'));
    }

    /**
     * Check if an email exists in the database. (Using AJAX)
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxEmail(Request $request)
    {
        $dl = new DataLayer();

        if($dl->findIfExistUserByEmail($request->input('email')))
        {
            $response = array('found'=>true);
        } else {
            $response = array('found'=>false);
        }
        return response()->json($response);
    }
}
