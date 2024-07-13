<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    /**
     * The attributes that are assignable.
     */
    protected $fillable = [
        'path',
        'description',
        'author',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function news(){
        return $this->belongsTo(News::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

}
