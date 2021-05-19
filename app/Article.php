<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    public function getRouteKey()
//    {
//     return 'slug'; //Article::where('slug', $article)->first();
//    }
    protected $fillable = ['title', 'excerpt', 'body'];
   // protected $guarded = [];
//It's dangerous to request->all here, you might allow some permissions
//to the user

    public function path()
    {
        return route('articles.show', $this);
    }

    public function  author()
    {
    return $this->belongsTo(User::class, 'user_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}

