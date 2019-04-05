<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Comment;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like(Request $request, $id)
    {
        if($request->query('comment')==true){
            $post = Comment::find($id);
        }else{
          $post = Post::find($id);
        }

        // 
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $post->likes()->save($like);
        // auth()->user()->likes()->associate($post)->save();

        response()->json([], 200);

    }

    public function unlike(Request $request, $id)
    {
        if($request->query('comment')==true){
            $post = Comment::find($id);
        }else{
          $post = Post::find($id);
        }

        // 
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $post->likes()->delete($like);
        response()->json([], 200);
    }

    public function isLiked(Request $request, $id)
    {
        if($request->query('comment')==true){
            $post = Comment::find($id);
        }else{
          $post = Post::find($id);
        }
       
        $userId = auth()->user()->id;
        
        $isLiked = (bool) $post->likes()->where('user_id', $userId)->first();

        return response()->json([
            'liked'=> $isLiked
        ],200);
    }
}
