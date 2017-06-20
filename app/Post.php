<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'category_id', 'description'];

    public function category()
    {
    	return $this->belongsTo('\App\Category', 'category_id');
    }

    public function tags()
    {
    	return $this->belongsToMany('\App\Tag');
    }
}
