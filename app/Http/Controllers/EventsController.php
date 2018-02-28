<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Event;

class EventsController extends Controller
{
    //
    public function index(){
        $events = Event::all();
        return view('events.index')->with('events', $events);
    }
    public function create(){
        $event = new Event();
        return view('events.create')->with('event', $event);
    }
    public function store(Request $request){
        $inputs = $request->all();
        Event::create($inputs);
        Session::flash('success', 'Event was added!');
        return redirect()->route('admin::events.create');
    }
    public function edit($event_id){
        $event = Event::find($event_id);
        return view('events.edit')->with('event', $event);
    }
    public function update(Request $request, $event_id){
        $inputs = $request->all();
        $event = Event::find($event_id);        
        $event->update($inputs);
        Session::flash('success', 'Event was Updated!');
        return redirect()->route('admin::events.index');
    }
    public function destroy($event_id){
        $event = Event::find($event_id);
        if($event->users->count() > 0){
            Session::flash('success', "The event has registered users and can't be deleted!");
        }
        else{
            Event::destroy($event_id);
            Session::flash('success', "Event was deleted!");            
        }
        return redirect()->back();         
    }
}
