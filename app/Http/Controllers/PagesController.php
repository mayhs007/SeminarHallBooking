<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;
use App\Event;
use Auth;
use Session;
use App\Registration;
class PagesController extends Controller
{
    //
    function root()
    {
        return view('auth.login');
    }
    function home(){

        return view('user_pages.home');
    }
    function hall()
    {
        $halls=Hall::all();
        return view('user_pages.hall')->with('halls',$halls);
    }
    function register(Request $request)
    {
        $count=0;
        $inputs = $request->all();
        $user=Auth::user();
        $registration=new Registration();
        $date=date_create($inputs['date_of_event']);
        $date=date_format($date, 'Y-m-d');
        $start_time=date_create($inputs['start_time']);
        $start_time=date_format($start_time, 'H:i:s');
        $end_time=date_create($inputs['end_time']);
        $end_time=date_format($end_time, 'H:i:s');
        $registreds=Registration::all()->where('hall_id',$inputs['hall_id'])
        ->where('date_of_event',$date)
        ->where('start_time',$start_time)
        ->where('end_time',$end_time);
        $event=Event::findOrFail($inputs['event_id']);
        $registres=Registration::all()
        ->where('date_of_event',$date)
        ->where('start_time',$start_time)
        ->where('end_time',$end_time);
        $current_time=date('H:i:s');
       // $current_time=date_format($current,'H:i:s');
            //$current_time=date_format($current_time, 'H:i:s'
           
        foreach($registres as $registred)
        {
            if($registred->user_id == $user->id && $registred->status=='Registered')
            {
                Session::flash('success', 'YOUR BOOKING HAS ALREADY BEEN MADE!');
                return view('user_pages.book'); 
            }
        }
        
        foreach($registreds as $registred)
        {    
            if($registred->user_id == $user->id)
            {
                Session::flash('success', 'YOUR BOOKING HAS ALREADY BEEN MADE!');
                return view('user_pages.book'); 
            }
        }
        foreach($registreds as $registred)
        {       
            
            
            if($registred->event->priority > $event->priority)
            {
                $registred->status='Waiting';
                $registred->save();
            }
            else
            {
                $registration->status='Waiting';
                $count=1;
            }
            if($registred->event->priority == $event->priority)
            {
                $registration->status='Waiting';
                $count=1;
            }
        }
        $registration->user_id=$user->id;
        $registration->hall_id=$inputs['hall_id'];
        $registration->club_id=$inputs['club_id'];
        $registration->event_id=$inputs['event_id'];
        $registration->ac=$inputs['ac'];
        if(isset($_POST['podium_mike']))
        {
            $registration->podium_mike=$inputs['podium_mike'];
        }    
        else
        {
            $registration->podium_mike=false;
        }
        //$registration->podium_mike=$inputs['podium_mike'];
        $registration->video_projector=$inputs['video_projector'];
        $registration->mike_with_card=$inputs['mike_with_card'];
        $registration->cordless_hand_mike=$inputs['cordless_hand_mike'];
        $registration->cordless_collar_mike=$inputs['cordless_collar_mike'];
        $registration->laser_pointer=$inputs['laser_pointer'];
        $registration->date_of_event=$date;
        $registration->start_time=$inputs['start_time'];
        $registration->end_time=$inputs['end_time'];
        if($count!=1)
        {
            $registration->status='Registered';
        }
        $registration->save();
        Session::flash('success', 'YOUR BOOKING HAS BEEN MADE!');
        return view('user_pages.book');   
    }
    function book()
    {
        return view('user_pages.book');
    }
    function unregister(Request $request)
    {
        $inputs=$request->all();
        $registration=Registration::findOrFail($inputs['id']);
        $registereds=Registration::all()->where('hall_id',$registration->hall_id)
        ->where('date_of_event',$registration->date_of_event)
        ->where('start_time',$registration->start_time)
        ->where('end_time',$registration->end_time);
        $registration->delete();
        $registrations=Registration::all()->where('user_id',Auth::user()->id);
        return view('user_pages.bookings')->with('registrations',$registrations);
    }
    function bookings()
    {
        $registrations=Registration::all()->where('user_id',Auth::user()->id);
        return view('user_pages.bookings')->with('registrations',$registrations);
    }
}
