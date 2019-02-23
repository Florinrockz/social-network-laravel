<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $request->post_id;
        $like->like = $request->isLike;
        $like->save();
    }
}
