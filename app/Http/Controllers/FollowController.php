<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    private $follow;

    public function __construct(Follow $follow)
    {
        $this->follow = $follow;
    }

    public function store($user_id)
    {
        $this->follow->follower_id = Auth::user()->id; //chihiro: if the logged user is chihiro
        $this->follow->following_id = $user_id; //shigemi
        $this->follow->save();

        return redirect()->back();

    }

    public function destroy($user_id) #parameter is only this
    {
        //Create the code
        //Add a new route
        //Use the route posts/contents/title.php
        //views > user > posts > show.blade.php
        // views > users > profile > header.blade.php

        $this->follow
        ->where('follower_id', Auth::user()->id)
        ->where('following_id', $user_id)
        ->delete();

        return redirect()->back();
    }


}
