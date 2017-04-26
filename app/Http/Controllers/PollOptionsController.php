<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PollOptions;
use Request;

class PollOptionsController extends Controller
{
    //
    public function index()
    {
        return PollOptions::all();
    }

    public function store()
    {
        $options = new PollOptions(Request::all());
        $options->save();
        return $options;
    }

    public function show($id)
    {
        return PollOptions::find($id);
    }

    public function addVote($id)
    {
        $options = PollOptions::find($id);
        $options->vote++;
        $options->save();
        return $options
    }

    public function destroy($id)
    {
       $options = PollOptions::find($id);
       $options->delete();  
    }

}
