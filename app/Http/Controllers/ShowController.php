<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use App\User;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    // to restrict un-authenticated user to access this controller
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show = Show::with('encodedUser.audience_data')->get(); // nested eager loading multiple relationship
        return view('/index', compact('show')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->user()->id);

        $validate_data = $request->validate([
            'show_name' => 'required|max:255',
            'genre' => 'required|max:255',
            'imdb_rating' => 'required|min:0|max:10|numeric',
            'lead_actor' => 'required|max:255'
        ]);
        $validate_data['encoder'] = $request->user()->id;
        $show = Show::create($validate_data);

        return redirect('/shows')->with('success', 'Show is successfully saved!');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $show = Show::findOrFail($id);

        return view('/create', compact("show"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate_data = $request->validate([
            'show_name' => 'required|max:255',
            'genre' => 'required|max:255',
            'imdb_rating' => 'required|min:0|max:10|numeric',
            'lead_actor' => 'required|max:255'
        ]);
        $show = Show::whereId($id)->update($validate_data);
        return redirect('/shows')->with('success', 'Show is successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function soft_delete($id)
    {
        // dd($id);
            $show = Show::find($id);
            $show->delete();       
            return redirect('/shows')->with('success', 'Show is successfully deleted!');
 
    }


}
