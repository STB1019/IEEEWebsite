<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;

class DataLayer
{

    public function listProjects() {
        $projects = Project::orderBy('title','asc')->get();
        return $projects;
    }

    public function listNews() {
        $news = News::orderBy('date','desc')->get();
        return $news;
    }

    public function listEvents() {
        $event = Event::orderBy('date_start','asc')->get();
        return $event;
    }

    public function listImages() {
        $i = Image::orderBy('id','asc')->get();
        return $i;
    }

    public function listThumbnail(){
        $img = Image::where('type', '=', 0)->get();
        return $img;
    }

    public function listAllImages(string $id, string $type)
    {
        if($type == "project")
            $images = Image::where('project_id', '=', $id)->get();
        else if($type == "news")
            $images = Image::where('news_id', '=', $id)->get();
        else
            $images = Image::where('event_id', '=', $id)->get();
        return $images;
    }

    public function listUsers() {
        $users = User::orderBy('id','asc')->get();
        return $users;
    }

    public function listUsersWithoutCaller($id) {
        $users = User::where('id', '!=', $id)->get();
        return $users;
    }

    public function listUsersOrderedByName() {
        $member = User::orderBy('name','asc')->get();
        return $member;
    }

    public function listUsersActive() {
        $member = User::where('active', true)->orderBy('name', 'asc')->get();
        return $member;
    }

    public function findProjectById($id) {
        return Project::find($id);
    }

    public function findNewsById($id) {
        return News::find($id);
    }

    public function findEventById($id) {
        return Event::find($id);
    }

    public function findUserById($id) {
        return User::find($id);
    }

    public function findIfExistUserByEmail($email) {
        $users = User::where('email', $email)->get();
        
        if (count($users) == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public function findImageByObjId($id, $type, $obj_type) {
        $i=null;
        if($obj_type == "project"){
            $i=Image::where('project_id', '=', $id)->where('type', '=', $type)->get();
        }
        else if($obj_type == "news"){
            $i=Image::where('news_id', '=', $id)->where('type', '=', $type)->get();
        }
        else{
            $i=Image::where('event_id', '=', $id)->where('type', '=', $type)->get();
        }
        
        return $i;
    }

    public function getUserRole($email) {
        $user = User::where('email', '=', $email)->first();
        return $user->role;
    }

    public function getUserName($email) {
        $user = User::where('email', '=', $email)->first();
        return $user->name;
    }

    public function getUserID($email) {
        $user = User::where('email', '=', $email)->first();
        return $user->id;
    }

    public function validUser($email, $password) {
        $user = User::where('email', $email)->first();
        
        if($user && Hash::check($password, $user->password))
        {
            return true;
        } else {
            return false;
        }        
    }
}