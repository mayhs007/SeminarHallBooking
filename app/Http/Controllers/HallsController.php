<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Hall;
use App\User;

class HallsController extends Controller
{
    //
    public function index(){
        $halls = Hall::all();
        return view('halls.index')->with('halls', $halls);
    }
    public function create(){
        $hall = new Hall();
        $organizers = "";
        return view('halls.create')->with('hall', $hall)->with('organizers',$organizers);
    }
    public function store(Request $request){
        $input = $request->all();
        // Upload file
        if(!empty($request->file('event_image'))){
            $filename = $request->file('event_image')->getClientOriginalName();
            $request->file('event_image')->move('images/events',  $filename);
            // Set image name
            $input['image'] = $filename;    
        }
        // Create event record    
        // Add organizers
        $registration=new Hall();
        if(isset($_POST['ac']))
        {
            $registration->ac=$input['ac'];
            $registration->ac_count=$input['ac_count'];
        }    
        else
        {
            $registration->ac=false;
            $registration->ac_count=0;
        }
       
        if(isset($_POST['podium_mike']))
        {
            $registration->podium_mike=$input['podium_mike'];
            $registration->podium_mike_count=$input['podium_mike_count'];
        }    
        else
        {
            $registration->podium_mike=false;
            $registration->podium_mike_count=0;
        }
        if(isset($_POST['video_projector']))
        {
            $registration->video_projector=$input['video_projector'];
            $registration->video_projector_count=$input['video_projector_count'];
        }    
        else
        {
            $registration->video_projector=false;
            $registration->video_projector_count=0;
        }
        if(isset($_POST['mike_with_card']))
        {
            $registration->mike_with_card=$input['mike_with_card'];
            $registration->mike_with_card_count=$input['mike_with_card_count'];
        }    
        else
        {
            $registration->mike_with_card=false;
            $registration->mike_with_card_count=0;
        }
        if(isset($_POST['cordless_hand_mike']))
        {
            $registration->cordless_hand_mike=$input['cordless_hand_mike'];
            $registration->cordless_hand_mike_count=$input['cordless_hand_mike_count'];
        }    
        else
        {
            $registration->cordless_hand_mike=false;
            $registration->cordless_hand_mike_count=0;
        }
        if(isset($_POST['cordless_collar_mike']))
        {
            $registration->cordless_collar_mike=$input['cordless_collar_mike'];
            $registration->cordless_collar_mike_count=$input['cordless_collar_mike_count'];
        }    
        else
        {
            $registration->cordless_collar_mike=false;
            $registration->cordless_collar_mike_count=0;
        }
        if(isset($_POST['laser_pointer']))
        {
            $registration->laser_pointer=$input['laser_pointer'];
            $registration->laser_pointer_count=$input['laser_pointer_count'];
        }    
        else
        {
            $registration->laser_pointer=false;
            $registration->laser_pointer_count=0;
        }
        $registration->name=$input['name'];
        $registration->location=$input['location'];
        $registration->capacity=$input['capacity'];
        $registration->image=$input['image'];
        $registration->save();
        $organizerEmails = explode(",", $input['organizers']);
        foreach($organizerEmails as $organizerEmail){
            $organizer = User::where('email', $organizerEmail)->first();
            $registration->organizers()->save($organizer);
        }
        // Set flash message
        Session::flash('success', 'The Hall was created successfully!');
        return redirect()->route('admin::halls.create');
    }
    public function edit($hall_id){
        $hall = Hall::find($hall_id);
        $organizers = "";
        return view('halls.edit')->with('hall', $hall)->with('organizers',$organizers);;
    }
    public function update(Request $request, $hall_id){
        $inputs = $request->all();
        if(!empty($request->file('event_image'))){
            $filename = $request->file('event_image')->getClientOriginalName();
            $request->file('event_image')->move('images/events',  $filename);
            // Set image name
            $inputs['image'] = $filename;    
        }
        $hall = Hall::find($hall_id);        
        $hall->update($inputs);
        Session::flash('success', 'Hall was Updated!');
        return redirect()->route('admin::halls.index');
    }
    public function destroy($hall_id){
        $hall = Hall::find($hall_id);
       
            Hall::destroy($hall_id);
            Session::flash('success', "Hall was deleted!");            
    
        return redirect()->back();         
    }
    function getAdmins(){
        $adminEmails = User::where('type', 'admin')->get(['email']);
        return response()->json($adminEmails);
    }
}
