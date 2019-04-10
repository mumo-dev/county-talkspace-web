<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addVote(Request $request)
    {
        Vote::create([
            'choice_id'=> $request->choice_id,
            'poll_id'=>$request->poll_id,
            'user_id' => auth()->user()->id
        ]);

        return response()->json([
            'message'=>'voted successfully added'
        ], 200);
    }
}
