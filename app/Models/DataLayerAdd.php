<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DataLayerAdd
{

    public function addProject($title, $description, $date, $team, $active, $layout, $thumbnail, $top_image, $images) {
        $project = new Project;
        $project->title = $title;
        $project->description = $description;
        $project->date = $date;
        $project->active = $active;
        $project->team_members = $team;

        if($active!=null){
            $project->active = true;
        }
        else{
            $project->active = false;
        }

        //check if layout is null
        if($layout != null)
            $project->layout = $layout;
        else
            $project->layout = 0;

        $project->save();

        $imageth = new Image;
        $imageth->path = Storage::putFile('public/img', $thumbnail);
        $imageth->author = "Placeholder";
        $imageth->description = "Placeholder";
        $imageth->type = 0;
        $imageth->project()->associate($project);
        $imageth->save();
        

        $imaget = new Image;
        $imaget->path = Storage::putFile('public/img', $top_image);
        $imaget->author = "Placeholder";
        $imaget->description = "Placeholder";
        $imaget->type = 1;
        $imaget->project()->associate($project);
        $imaget->save();


        foreach ($images as $image) {
            $image1 = new Image;
            $image1->path = Storage::putFile('public/img', $image);
            $image1->author = "Placeholder";
            $image1->description = "Placeholder";
            $image1->type = 2;
            $image1->project()->associate($project);
            $image1->save();
        }
    }

    public function addNews($title, $description, $date, $author, $layout, $thumbnail, $top_image, $images) {
        $news = new News;
        $news->title = $title;
        $news->description = $description;
        $news->date = $date;
        $news->author = $author;

        if($layout != null)
            $news->layout = $layout;
        else
            $news->layout = 0;

        $news->save();

        $imageth = new Image;
        $imageth->path = Storage::putFile('public/img', $thumbnail);
        $imageth->author = "Placeholder";
        $imageth->description = "Placeholder";
        $imageth->type = 0;
        $imageth->news()->associate($news);
        $imageth->save();
        

        $imaget = new Image;
        $imaget->path = Storage::putFile('public/img', $top_image);
        $imaget->author = "Placeholder";
        $imaget->description = "Placeholder";
        $imaget->type = 1;
        $imaget->news()->associate($news);
        $imaget->save();


        foreach ($images as $image) {
            $image1 = new Image;
            $image1->path = Storage::putFile('public/img', $image);
            $image1->author = "Placeholder";
            $image1->description = "Placeholder";
            $image1->type = 2;
            $image1->news()->associate($news);
            $image1->save();
        }
    }

    public function addEvent($title, $description, $date1, $date2, $layout, $thumbnail, $top_image, $images) {
        $event = new Event;
        $event->title = $title;
        $event->description = $description;
        $event->date_start = $date1;
        $event->date_end = $date2;

        //check if layout is null
        if($layout != null)
            $event->layout = $layout;
        else
            $event->layout = 0;

        $event->save();

        $imageth = new Image;
        $imageth->path = Storage::putFile('public/img', $thumbnail);
        $imageth->author = "Placeholder";
        $imageth->description = "Placeholder";
        $imageth->type = 0;
        $imageth->event()->associate($event);
        $imageth->save();
        

        $imaget = new Image;
        $imaget->path = Storage::putFile('public/img', $top_image);
        $imaget->author = "Placeholder";
        $imaget->description = "Placeholder";
        $imaget->type = 1;
        $imaget->event()->associate($event);
        $imaget->save();


        foreach ($images as $image) {
            $image1 = new Image;
            $image1->path = Storage::putFile('public/img', $image);
            $image1->author = "Placeholder";
            $image1->description = "Placeholder";
            $image1->type = 2;
            $image1->event()->associate($event);
            $image1->save();
        }
    }

    public function addUser($name, $password, $email) {
        $user = new User();
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->email = $email;
        $userCount = User::count();
        $user->role = ($userCount === 0) ? "admin" : "member";
        $user->email_verified_at = now();
        $user->save();
    }
}
