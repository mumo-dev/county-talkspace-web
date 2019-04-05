<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index($id)
    {
        $post = Post::with(['images','user'])->where('id',$id)->get();
        return view('comment', compact('post'));
    }

    public function store(Request $request)
    {
        # code...
    }
}
