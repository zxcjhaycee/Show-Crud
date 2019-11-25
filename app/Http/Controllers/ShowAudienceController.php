<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use App\Audience;
use App\ShowAudience;

class ShowAudienceController extends Controller
{
    //
    public function index($id){
        // $show = Show::with('audience')->get();
        $show = Show::with(['audience' => function($q) use ($id){
            $q->where('audience_id', $id);
        }])->get();
        return view('audiences_show_index', compact('show'));
    }

    public function watch($id){

        return view('shows_watch', compact('id'));

    }

    public function watch_submit(Request $request, $id){
            $validate_data = $request->validate([
                'rating' => 'required'
            ]);
            $validate_data['audience_id'] = Audience::current_user()->id;
            $validate_data['show_id'] = $id;
            $watch = ShowAudience::create($validate_data);

            return redirect('/shows')->with('success', 'Success!');

    }
}
