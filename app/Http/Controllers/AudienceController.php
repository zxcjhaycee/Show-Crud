<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audience;
class AudienceController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function index(){
        $audiences = Audience::all();
        return view('/audience_index', compact('audiences'));
    }

    public function create(){
        return view('/audience_create');
    }

    public function store(Request $request){
        $validate_data = $request->validate(
            [
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'birthday' => 'required|date',
                'birth_place' => 'required',
                'age' => 'required|numeric',
                'sex' => 'required|in:Male,Female'
            ]
        );
        $audience = Audience::create($validate_data);

        return redirect('/audiences')->with('success', 'Audience was successfully added!');

    }

    public function edit($id){
        $audiences = Audience::findOrFail($id);

        return view('/audience_edit', compact('audiences'));
    }
    
    public function update($id, Request $request){
        $validate_data = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|date',
            'birth_place' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required|in:Male,Female'
        ]);
        $audience = Audience::whereId($id)->update($validate_data);
        return redirect('/audiences')->with('success', 'Audience was successfully updated');
    }

    public function destroy($id){
        $audience = Audience::whereId($id)->delete();

        return redirect('/audiences')->with('success', 'Audience was successfully deleted');
    }


}
