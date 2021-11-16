<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["author", "published_at", "post_name", "post_description", "content"];

    public function category(){
        return $this->belongsTo("App\Category");
    }
}
