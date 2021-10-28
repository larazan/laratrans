<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
    ];

    public function articles() 
    {
        return $this->morphedByMany('App\Models\Article', 'taggable');
    }

    
}
