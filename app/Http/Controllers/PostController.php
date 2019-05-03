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

                // PostImage::create([
                //     'post_id'=> $post->id,
                //     'name'=>$imagename
                // ]);
                $postImage = new PostImage();
                $postImage->name = $imagename;
                $post->images()->save($postImage);

           }
       }

       $postAdded = $post::withCount(['comments','likes'])
                    ->with(['images','user'])->where('id',$post->id)->get();
       return response()->json([
           'post'=>$postAdded
       ],200);
    }


    public function index()
    {
        $posts = Post::withCount(['comments','likes'])->with(['user','images'])->latest()->paginate(50);
        return response()->json([$posts], 200);
    }


    public function getPostsByTag(Request $request, $tag)
    {
        $posts = Post::withCount(['comments','likes'])
                ->with(['user','images'])->where('tag', $tag)->latest()->paginate(50);
        return response()->json([$posts], 200);
    }

    public function markPostAsRead($id)
    {
        $post = Post::find($id);
        $post->read =1;
        $post->save();
        return response()->json([], 200);
    }

    public function getPostsByUser($id)
    {
        $posts = Post::withCount(['comments','likes'])
                        ->with(['user','images'])
                        ->where('user_id', $id)
                        ->latest()->paginate(50);
        return response()->json([$posts], 200);
    }
}
