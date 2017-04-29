<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PollOptions;

class PollOptionsController extends Controller
{
    //
    public function index()
    {
        return PollOptions::all();
    }

    public function store(Request $req)
    {
        $data = [
            
            'title' => $req->title,
            'poll_id' => $req->poll_id

        ];
        $options = new PollOptions($data);
        $options->save();
        return $options;
    }

    public function show($id)
    {
        return PollOptions::find($id);
    }

    public function update($id)
    {
        $options = PollOptions::find($id);
        $options->vote++;
        $options->save();
        return $options;
    }

    public function destroy($id)
    {
       $options = PollOptions::find($id);
       $options->delete();  
    }

}
