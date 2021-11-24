<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["user_id", "published_at", "post_name", "post_description", "content", "image"];

    public function getImage(){
        if ( str_starts_with($this->image, "public")){
            return asset('storage/') . '/';
        }
        return "";
    }

    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

}
