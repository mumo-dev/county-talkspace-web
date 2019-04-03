<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Image as PostImage;
use Image;

class PostController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request)
    {
    
        $post = Post::create([
            'message'=>$request->message,
            'tag'=>$request->tag,
            'user_id'=>auth()->user()->id
        ]);

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

                PostImage::create([
                    'post_id'=> $post->id,
                    'name'=>$imagename
                ]);

           }
       }

       $post = $post::with('images')->get();
       return response()->json([
           'post'=>$post
       ],200);
    }
}
