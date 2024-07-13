<?php

namespace App\Models;

class DataLayerDelete
{
    public function deleteProject(string $id) {
        $project = Project::find($id);
        $project->delete();
    }

    public function deleteNews(string $id) {
        $news = News::find($id);
        $news->delete();
    }

    public function deleteEvent(string $id) {
        $event = Event::find($id);
        $event->delete();
    }
    
    public function deleteUser(string $id) {
        $user = User::find($id);
        $user->delete();
    }
}
