<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll as Poll;
use Request;


class PollsController extends Controller
{
    //
    public function index()
    {
        return Poll::with('polloptions')->get();
    }

    public function store()
    {
        $poll = new Poll(Request::all());
        $poll->save();
        return $poll;
    }

    public function show($id)
    {
        return Poll::with('polloptions')->findOrFail($id);
    }

    public function destroy($id)
    {
        $poll = Poll::find($id);
        $poll->delete();
    }


}
