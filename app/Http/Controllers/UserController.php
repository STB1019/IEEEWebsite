<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayerDelete;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;
use App\Models\DataLayerEdit;
use Illuminate\Support\Facades\Hash;

/**
 * Controller for the users, to delete, update and check of the old password using (AJAX)
 */
class UserController extends Controller
{
    public function destroy(string $id)
    { 
        $dl = new DataLayerDelete();
        $dl->deleteUser($id);
        return Redirect::to(route('panel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dl = new DataLayerEdit();
        $dl->editUser(
            $id,
            $request->input('name'),
            $request->input('email'),
            $request->input('password'),
            $request->input('confirmPassword'),
            $request->input('isactive'),
            $request->input('nickname'),
            $request->input('position'),
            $request->input('role'),
            $request->file('image'),
        );
        return Redirect::route('panel');
    }

    public function edit(string $id)
    {
        $dl = new DataLayer();
        $user = $dl->findUserById($id);

        if ($user != null) {
            return view('user')->with('user', $user)->with('sessionuserrole', $_SESSION['role']);
        } else {
            return view('errors.404');
        }
    }

    /**
     * Method that checks if the old password is correct using AJAX
     */
    public function ajaxOldPassword(Request $request) {

        $dl = new DataLayer();

        $user = $dl->findUserById($_SESSION['loggedID']);
        
        if(Hash::check($request->input('rpassword'),$user->password))
        {
            $response = array('valid'=>true);
        } else {
            $response = array('valid'=>false);
        }
        return response()->json($response);
    }
}
