<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //relationshipを作る
    #To get the info of the owner of the comment
    public function user()
    {
        //find the owner
        return $this->belongsTo(User::class)->withTrashed();
    }

    #To get all the comments of a post
    public function comments()
    {
        return $this->hasMany(Comment::class)->withTrashed();
    }
}
