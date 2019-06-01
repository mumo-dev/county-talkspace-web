<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Choice;
use App\Poll;
use App\Vote;
use App\Audit;

class PollsController extends Controller
{
    public function index()
    {
        $polls = Poll::withCount(['votes'])->with(['choices'])->latest()->get();

        $polls = $polls->map(function($item, $key){
                    $item['has_voted'] = auth()->user()->hasVoted($item->id);
                    foreach($item['choices'] as $index=>$choice){
                        $item['choices'][$index]['votes'] = $item->votes()
                                           ->where('choice_id',$choice->id)->count();
                    }
                    
                    return $item;
                });
        return view('admin.polls', compact('polls'));
    }

    
    public function displayPolls()
    {
        
        $polls = Poll::withCount(['votes'])->with(['choices'])->latest()->get();

        $polls = $polls->map(function($item, $key){
                    $item['has_voted'] = auth()->user()->hasVoted($item->id);
                    foreach($item['choices'] as $index=>$choice){
                        $item['choices'][$index]['votes'] = $item->votes()
                                           ->where('choice_id',$choice->id)->count();
                    }
                    
                    return $item;
                });
        //count votes foreach choice//
       
      
        return view('polls', compact('polls'));
    }

    public function store(Request $request){

        $expiry_date = $request->expiry_date;
        $question = $request->question;
        $choices =$request->choices;

        $poll = Poll::create([
            'question'=>$question,
            'expiry_date' => $expiry_date
        ]);

        //store audit record
        Audit::create([
            'user_id'=>auth()->user()->id,
            'type'=>'Poll',
            'action' =>'create'
        ]);

        foreach($choices as $choice){
            $ch = new Choice();
            $ch->value = $choice;
            $ch->poll_id = $poll->id;
            $ch->save();
        }

        return response()->json([
            'message' => 'Poll created'
        ], 200);

    }
}
