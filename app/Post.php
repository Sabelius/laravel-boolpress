<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["author", "post_creation_date", "post_name", "post_description", "content"];

    public function category(){
        return $this->belongsTo("App\Category");
    }
}
