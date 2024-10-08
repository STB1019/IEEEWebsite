<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    /**
     * The attributes that are assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'layout',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
