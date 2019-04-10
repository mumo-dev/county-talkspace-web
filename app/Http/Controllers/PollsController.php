<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Choice;
use App\Poll;

class PollsController extends Controller
{
    public function index()
    {
        return view('admin.polls');
    }

    public function store(Request $request){

        $expiry_date = $request->expiry_date;
        $question = $request->question;
        $choices =$request->choices;

        $poll = Poll::create([
            'question'=>$question,
            'expiry_date' => $expiry_date
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
