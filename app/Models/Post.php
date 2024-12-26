<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
// softdeletesとdropsoftdelete使うから



class Post extends Model
{
    use SoftDeletes;

    #A post belongs to user
    #To get the owner or the post
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    #To get the categories under the post
    public function categoryPost()
    {
        return $this->hasMany(CategoryPost::class);
    }

    #To get all the comments of a post
    public function comments()
    {
                              #modelのCommentのこと
        return $this->hasMany(Comment::class);
    }
    
    #To get the likes of post
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    #Return TRUE if the Auth user already liked the post
    public function isLike()
    {
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }
}
