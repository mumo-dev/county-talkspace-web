<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    

    public function index()
    {
        return view('admin.news.news');
    }

    public function create()
    {
        return view('admin.news.news-create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'title'=>'required|min:3',
            'description'=> 'required'
        ]);

        
      
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $imagename ='NEWS_'. uniqid(). '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $photo->move($destinationPath, $imagename); 
            News::create([
                'title'=>$request->title,
                'description' => $request->description,
                'photo_url' => $imagename
            ]);
           
        }else{
            News::create([
                'title'=>$request->title,
                'description' => $request->description
            ]);
        }
        

        return redirect()->route('admin.news')->withMessage('The news have been published successfully');


    }

}
