<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    

    public function index()
    {
        $news = News::latest()->paginate(30);
        return view('admin.news.news', compact('news'));
    }

    public function show($id)
    {
        $news = News::find($id);
        return view('admin.news.news-show', compact('news'));
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.news-edit', compact('news'));
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

         //store audit record
         Audit::create([
            'user_id'=>auth()->user()->id,
            'type'=>'News',
            'action' =>'create'
        ]);
        

        return redirect()->route('admin.news')->withMessage('The news have been published successfully');


    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|min:3',
            'description'=> 'required'
        ]);

        $news = News::find($request->id);

        if($request->hasFile('photo')) {
            if($news->photo_url != null) {
                unlink(public_path('/images/'). $news->photo_url);
            }
            $photo = $request->file('photo');
            $imagename ='NEWS_'. uniqid(). '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $photo->move($destinationPath, $imagename); 
           
            $news->title=$request->title;
            $news->description = $request->description;
            $news->photo_url = $imagename;
            $news->save();
           
        }else{
            $news->title = $request->title;
            $news->description = $request->description;
            $news->save();
        }

         //store audit record
         Audit::create([
            'user_id'=>auth()->user()->id,
            'type'=>'News',
            'action' =>'update'
        ]);
        
        return redirect()->route('admin.news.show', $news->id)->withMessage('The news have been updated successfully');

    }

    public function delete(Request $request)
    {
      
        $news = News::find($request->id);
        $news->delete();

         //store audit record
         Audit::create([
            'user_id'=>auth()->user()->id,
            'type'=>'News',
            'action' =>'delete'
        ]);

        return redirect()->route('admin.news')
                        ->withMessage('News Item deleted successfully');
    }


    public function showNews()
    {
        $news = News::latest()->paginate(30);

        return view('news', compact('news'));
    }

    
    public function showNewsDetails($id)
    {
        $news = News::find($id);
        return view('news-show', compact('news'));
    }

}
