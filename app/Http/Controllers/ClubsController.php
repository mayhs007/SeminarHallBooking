<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use Session;

class ClubsController extends Controller
{
    //
    public function index(){
        $clubs = Club::all();
        return view('clubs.index')->with('clubs', $clubs);
    }
    public function create(){
        $club = new Club();
        return view('clubs.create')->with('club', $club);
    }
    public function store(Request $request){
        $inputs = $request->all();
        Club::create($inputs);
        Session::flash('success', 'Club was added!');
        return redirect()->route('admin::clubs.create');
    }
    public function edit($club_id){
        $club = Club::find($club_id);
        return view('clubs.edit')->with('club', $club);
    }
    public function update(Request $request, $club_id){
        $inputs = $request->all();
        $club = Club::find($club_id);        
        $club->update($inputs);
        Session::flash('success', 'Club was Updated!');
        return redirect()->route('admin::clubs.index');
    }
    public function destroy($club_id){
        $club = Club::find($club_id);
            Club::destroy($club_id);
            Session::flash('success', "Club was deleted!");            
        return redirect()->back();         
    }
}
