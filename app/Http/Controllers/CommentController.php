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
        $post = Post::withCount(['likes'])
                        ->with(['images','user'])->where('id',$id)->get();

        $post = $post->map(function ($item, $key) {
            $count = $item->comments()->get()->count();
            $item['comments_count'] = $count;
            return $item;
        });
        return view('comments.post', compact('post'));
    }

    public function displayComments($id)
    {
        $post = Comment::find($id);
        // $count =  $post->comments()->get()->count();
        //TOD fetch the count of comments manually
        $comment = Comment::withCount(['likes'])
                        ->with(['images','user','comments'])->where('id',$id)->get();
        $comment = $comment->map(function ($item, $key) {
                        // $count = $item->comments()->get()->count();
                        // $item['comments_count'] = $count;
                        $item['comments_count'] = count($item['comments']);
                        unset($item['comments']);
                        return $item;
                    });
        // $comment['comments_count'] = $count;

        return view('comments.comment', compact('comment'));
    }


    

    public function store(Request $request)
    {
        $postId= $request->post_id;

        if($request->has('is_comment')){
            $post = Comment::find($postId);
        }else{

            $post = Post::find($postId);
        }
      
      
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
 
        $commentAdded = $comment::withCount(['comments','likes'])
                        ->with(['images','user'])->where('id',$comment->id)->get();
        return response()->json([
            'comment'=>$commentAdded
        ],200);

    }


    public function getPostComments(Request $request,$id)
    {
       if($request->query('comment')==true){
           $post = Comment::find($id);
           
       }else{
         $post = Post::find($id);
         
       }
      
        $comments = $post->comments()->withCount(['likes'])
                    ->with(['user', 'images','comments'])->latest()->get();
        $comments = $comments->map(function ($item, $key) {
            // $count = $item->comments()->get()->count();

            $item['comments_count'] = count($item['comments']);
            unset($item['comments']);
            return $item;
        });
       
        return response()->json([$comments], 200);
    }
}
