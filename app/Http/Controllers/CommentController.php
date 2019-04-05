<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Image;
use App\Image as CommentImage;

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
        $postId= $request->post_id;
        $post = Post::find($postId);
        $msg = $request->comment;

        $comment = new Comment();
        $comment->message = $msg;
        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);


        if($request->hasFile('images')){
            //save image
            foreach($request->file('images') as $image)
            {
 
                 $imagename = uniqid(). '.' . $image->getClientOriginalExtension();
                 $destinationPath = public_path('/images/thumbnails');
 
                 $img = Image::make($image->getRealPath());
                 $img->resize(300, 300, function($constraint){
                     $constraint->aspectRatio();
                 })->save($destinationPath.'/'.$imagename);
         
                 $destinationPath = public_path('/images');
                 $image->move($destinationPath, $imagename); 
 
               
                 $commentImage = new CommentImage();
                 $commentImage->name = $imagename;
                 $comment->images()->save($commentImage);
 
            }
        }
 
        $commentAdded = $comment::with(['images','user'])->where('id',$comment->id)->get();
        return response()->json([
            'comment'=>$commentAdded
        ],200);

    }


    public function getPostComments($id)
    {
        $post = Post::find($id);
        $comments =$post->comments()->with(['user', 'images'])->latest()->get();
        return response()->json([$comments], 200);
    }
}
