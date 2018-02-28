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
        $inputs = $request->all();
        $user=Auth::user();
        $registration=new Registration();
        $registration->registration_id =$user->id;
        $registration->hall_id=$inputs['hall_id'];
        $registration->event_id=$inputs['event_id'];
        $date=date_create($inputs['date_of_event']);
        $registration->date_of_event=date_format($date,"Y/m/d");;
        $registration->start_time=$inputs['start_time'];
        $registration->end_time=$inputs['end_time'];
        $registration->save();
        Session::flash('success', 'YOUR BOOKING HAS BEEN MADE!');
        return view('user_pages.book');
    }
    function book()
    {
        return view('user_pages.book');
    }
}
