<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;
use App\Event;
use Auth;
use Session;
use App\Registration;
use Mail;
use App\Club;
use App\User;
use App\Mail\RegistrationNotification;
use App\Mail\WaitingNotification;
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
        
        $from_date=date_create($inputs['from_date']);
        $from_date=date_format($from_date, 'Y-m-d');
        
        
        
        $start_time=date_create($inputs['start_time']);
        $start_time=date_format($start_time, 'H:i:s');
        
        $end_time=date_create($inputs['end_time']);
        $end_time=date_format($end_time, 'H:i:s');
        
        $event=Event::findOrFail($inputs['event_id']);
        $hall=Hall::findOrFail($inputs['hall_id']);
        $club=Club::findOrFail($inputs['club_id']);
        if(isset($_POST['to_date']))
        {
            $to_date=date_create($inputs['to_date']);
            $to_date=date_format($to_date, 'Y-m-d');
            $registration->to_date= $to_date;
            $registrations=Registration::all()->where('hall_id',$inputs['hall_id'])
            ->where('from_date',$from_date)
            ->where('to_date',$to_date);
        }
        else
        {   
            $registration->to_date=$from_date;
            $registrations=Registration::all()->where('hall_id',$inputs['hall_id'])
            ->where('from_date',$from_date)
            ->where('to_date',$from_date);
        }
        foreach($registrations as $registered)
        {       
            if($registered->user_id == $user->id && $registered->status=='Registered')
            {
                if($registered->start_time == $start_time && $registration->end_time == $end_time)
                {
                    Session::flash('success', 'YOUR BOOKING HAS ALREADY BEEN MADE!');
                    return view('user_pages.book'); 
                }
            }
            $s_time = date("H:i:s", strtotime($registered->start_time));
            $e_time = date("H:i:s", strtotime($registered->end_time));
            
            {
            
            }
            if($registered->event->priority > $event->priority)
            {
                $registered->status='Waiting';
                $registered_user=User::findorFail( $registered->user_id);
                $registered_event=Event::findOrFail(  $registered->event_id);
                $registered_hall=Hall::findOrFail( $registered->hall_id);
                $registered_club=Club::findOrFail( $registered->club_id);
                $registered_from_date= $registered->from_date;
                $registered_to_date= $registered->to_date;
                $registered_start_time= $registered->start_time;
                $registered_end_time= $registered->end_time;
                Mail::to($registered_user->email)->send(new WaitingNotification($registered_user,$registered_event,$registered_hall,$registered_club,$registered_from_date,$registered_to_date, $registered_start_time, $registered_end_time));
                $registered->save();
            }
            else
            {   if($start_time >= $s_time || $end_time <= $e_time)
                {
                    $registration->status='Waiting';
                    $count=1;
                }
                else
                {
                    $registration->status='Waiting';
                    $count=1;
                }
               
            }
            if( $registered->event->priority == $event->priority)
            {
                if($start_time >= $s_time || $end_time <= $e_time)
                {
                    $registration->status='Waiting';
                    $count=1;
                }
                else
                {
                    $registration->status='Waiting';
                    $count=1;
                }
               
            }
        }
        $registration->user_id=$user->id;
        $registration->hall_id=$inputs['hall_id'];
        $registration->club_id=$inputs['club_id'];
        $registration->event_id=$inputs['event_id'];
        if(isset($_POST['ac']))
        {
            $registration->ac=$inputs['ac'];
        }    
        else
        {
            $registration->ac=false;
        }
       
        if(isset($_POST['podium_mike']))
        {
            $registration->podium_mike=$inputs['podium_mike'];
        }    
        else
        {
            $registration->podium_mike=false;
        }
        if(isset($_POST['video_projector']))
        {
            $registration->video_projector=$inputs['video_projector'];
        }    
        else
        {
            $registration->video_projector=false;
        }
        if(isset($_POST['mike_with_card']))
        {
            $registration->mike_with_card=$inputs['mike_with_card'];
        }    
        else
        {
            $registration->mike_with_card=false;
        }
        if(isset($_POST['cordless_hand_mike']))
        {
            $registration->cordless_hand_mike=$inputs['cordless_hand_mike'];
        }    
        else
        {
            $registration->cordless_hand_mike=false;
        }
        if(isset($_POST['cordless_collar_mike']))
        {
            $registration->cordless_collar_mike=$inputs['cordless_collar_mike'];
        }    
        else
        {
            $registration->cordless_collar_mike=false;
        }
        if(isset($_POST['laser_pointer']))
        {
            $registration->laser_pointer=$inputs['laser_pointer'];
        }    
        else
        {
            $registration->laser_pointer=false;
        }
        $registration->from_date=$from_date;
        $registration->start_time=$inputs['start_time'];
        $registration->end_time=$inputs['end_time'];
        if($count!=1)
        {
            $registration->status='Registered';
        }
        $registration->save();
        Session::flash('success', 'YOUR BOOKING HAS BEEN MADE!');
        Mail::to($user->email)->send(new RegistrationNotification($user,$event,$hall,$club,$from_date,$to_date,$start_time,$end_time, $registration->status));
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
        $hall=$registration->hall_id;
        $registereds=Registration::all()->where('hall_id',$registration->hall_id)
        ->where('date_of_event',$registration->date_of_event)
        ->where('start_time',$registration->start_time)
        ->where('end_time',$registration->end_time);
        $registrations=Registration::all()->where('hall_id',$hall);
        $registration->delete();   
        $registrations=Registration::all()->where('user_id',Auth::user()->id);
        return view('user_pages.bookings')->with('registrations',$registrations);
    }
    function bookings()
    {
        $registrations=Registration::all()->where('user_id',Auth::user()->id);
        return view('user_pages.bookings')->with('registrations',$registrations);
    }
    function register_edit(Request $request)
    {
        $inputs=$request->all();
        $registrations=Registration::findOrFail($inputs['id']);
        return view('user_pages.book_edit')->with('registrations',$registrations);

    }
    function suggestion(Request $request)
    {
        $registrations=Registration::findOrFail($inputs['id']);
    }
    function registration(Request $request)
    {
        $inputs=$request->all();
        $registrations=Registration::all()->where('hall_id',$inputs['id']);
        $registration_count=$registrations->count();
        return view('user_pages.registration')->with('registrations',$registrations)->with('registration_count',$registration_count);
    }
}
