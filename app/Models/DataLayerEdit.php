<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DataLayerEdit 
{
    public function editProject($id, $title, $description, $date, $team, $active, $layout, $thumbnail, $top_image, $images)
    {
        $project = Project::find($id);
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

        $dl = new DataLayer();

        if($thumbnail != null){
            //Detach images from the project
            $imageth = $dl->findImageByObjId($project->id, 0, "project");
            
            if($imageth->first()!=null){
                Storage::delete($imageth->first()->path);
                $imageth->first()->delete();
            }

            $imageth = new Image;
            $imageth->path = Storage::putFile('public/img', $thumbnail);
            $imageth->author = "Placeholder";
            $imageth->description = "Placeholder";
            $imageth->type = 0;
            $imageth->project()->associate($project);
            $imageth->save();
        }

        if($top_image != null){
            //Detach images from the project
            $imaget = $dl->findImageByObjId($project->id, 1, "project");
            
            if($imaget->first()!=null){
                Storage::delete($imaget->first()->path);
                $imaget->first()->delete();
            }

            $imaget = new Image;
            $imaget->path = Storage::putFile('public/img', $top_image);
            $imaget->author = "Placeholder";
            $imaget->description = "Placeholder";
            $imaget->type = 1;
            $imaget->project()->associate($project);
            $imaget->save();
        }

        
        if($images != null){
            $images_old = $dl->findImageByObjId($project->id, 2, "project");

            foreach ($images_old as $image) {
                if($image!=null){
                    Storage::delete($image->path);
                    $image->delete();
                }
            }

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

    }

    public function editNews($id, $title, $description, $date, $author, $layout, $thumbnail, $top_image, $images) {
        $news = News::find($id);
        $news->title = $title;
        $news->description = $description;
        $news->date = $date;
        $news->author = $author;

        //check if layout is null
        if($layout != null)
            $news->layout = $layout;
        else
            $news->layout = 0;

        $news->save();

        $dl = new DataLayer();

        if($thumbnail != null){
            //Detach images from the news
            $imageth = $dl->findImageByObjId($news->id, 0, "news");
            
            if($imageth->first()!=null){
                Storage::delete($imageth->first()->path);
                $imageth->first()->delete();
            }

            $imageth = new Image;
            $imageth->path = Storage::putFile('public/img', $thumbnail);
            $imageth->author = "Placeholder";
            $imageth->description = "Placeholder";
            $imageth->type = 0;
            $imageth->news()->associate($news);
            $imageth->save();
        }
        
        if($top_image != null){
            //Detach images from the news
            $imaget = $dl->findImageByObjId($news->id, 1, "news");
            
            if($imaget->first()!=null){
                Storage::delete($imaget->first()->path);
                $imaget->first()->delete();
            }

            $imaget = new Image;
            $imaget->path = Storage::putFile('public/img', $top_image);
            $imaget->author = "Placeholder";
            $imaget->description = "Placeholder";
            $imaget->type = 1;
            $imaget->news()->associate($news);
            $imaget->save();
        }

        if($images != null){
            $images_old = $dl->findImageByObjId($news->id, 2, "news");

            foreach ($images_old as $image) {
                if($image!=null){
                    Storage::delete($image->path);
                    $image->delete();
                }
            }
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
    }

    public function editEvent($id, $title, $description, $date1, $date2, $layout, $thumbnail, $top_image, $images) {
        $event = Event::find($id);
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

        $dl = new DataLayer();

        if($thumbnail != null){
            //Detach images from the news
            $imageth = $dl->findImageByObjId($event->id, 0, "event");
            
            if($imageth->first()!=null){
                Storage::delete($imageth->first()->path);
                $imageth->first()->delete();
            }

            $imageth = new Image;
            $imageth->path = Storage::putFile('public/img', $thumbnail);
            $imageth->author = "Placeholder";
            $imageth->description = "Placeholder";
            $imageth->type = 0;
            $imageth->event()->associate($event);
            $imageth->save();
        }
        

        if($top_image != null){
            //Detach images from the news
            $imaget = $dl->findImageByObjId($event->id, 1, "event");
            
            if($imaget->first()!=null){
                Storage::delete($imaget->first()->path);
                $imaget->first()->delete();
            }

            $imaget = new Image;
            $imaget->path = Storage::putFile('public/img', $top_image);
            $imaget->author = "Placeholder";
            $imaget->description = "Placeholder";
            $imaget->type = 1;
            $imaget->event()->associate($event);
            $imaget->save();
        }

        if($images != null){
            $images_old = $dl->findImageByObjId($event->id, 2, "event");
   
            foreach ($images_old as $image) {
                if($image!=null){
                    Storage::delete($image->path);
                    $image->delete();
                }
            }
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

    }

    public function editUser($id, $name, $email, $password, $password_old, $active, $nickname, $position, $role, $image) {
        $user = User::find($id);
        $user->name = $name;
        if($email != null){
            $user->email = $email;
        }

        //Check if password is changed, all the other checks are done before using javascript and ajax
        if($password != null){
            $user->password = Hash::make($password);
        }
        
        if($active=="on"){
            $user->active = true;
        }
        else{
            $user->active = false;
        }
        $user->nickname = $nickname;
        $user->position = $position;

        if($role != null){
        $user->role = $role;
        }

        if($user->image != null){
            Storage::delete($user->image);
        }
        if($image != null){
            $user->image = Storage::putFile("public/img",$image);
        }
        else{
            $user->image = null;
        }
        $user->save();
        
    }
}
