<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Hall;

class HallsController extends Controller
{
    //
    public function index(){
        $halls = Hall::all();
        return view('halls.index')->with('halls', $halls);
    }
    public function create(){
        $hall = new Hall();
        return view('halls.create')->with('hall', $hall);
    }
    public function store(Request $request){
        $inputs = $request->all();
        // Upload file
        if(!empty($request->file('event_image'))){
            $filename = $request->file('event_image')->getClientOriginalName();
            $request->file('event_image')->move('images/events',  $filename);
            // Set image name
            $input['image'] = $filename;    
        }
        Hall::create($inputs);
        Session::flash('success', 'Hall was added!');
        return redirect()->route('admin::halls.create');
    }
    public function edit($hall_id){
        $hall = Hall::find($hall_id);
        return view('halls.edit')->with('hall', $hall);
    }
    public function update(Request $request, $hall_id){
        $inputs = $request->all();
        $hall = Hall::find($hall_id);        
        $hall->update($inputs);
        Session::flash('success', 'Hall was Updated!');
        return redirect()->route('admin::halls.index');
    }
    public function destroy($hall_id){
        $hall = Hall::find($hall_id);
        if($hall->users->count() > 0){
            Session::flash('success', "The hall has registered users and can't be deleted!");
        }
        else{
            Hall::destroy($hall_id);
            Session::flash('success', "Hall was deleted!");            
        }
        return redirect()->back();         
    }
}