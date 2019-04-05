<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{
   
    public function index($id)
    {
        $post = Post::with(['images','user'])->where('id',$id)->get();
        return view('comment', compact('post'));
    }
}
