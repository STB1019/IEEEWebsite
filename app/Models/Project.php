<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    /**
     * The attributes that are assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'active',
        'team',
        'layout',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    
}
