<?php

namespace App\Http\Middleware;

use Closure;
use App\Registration;
use App\User;
use Session;
use Auth;
use App\Event;
class CheckRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*$inputs=$request->all();
        $date=date_create($inputs['date_of_event']);
        $registration=Registration::all()
        ->where('user_id',Auth::user()->id)
        ->where('hall_id',$inputs['hall_id'])
        ->where('club_id',$inputs['club_id'])
        ->where('event_id',$inputs['event_id'])
        ->where('ac',$inputs['ac'])
        ->where('podium_mike',$inputs['podium_mike'])
        ->where('video_projector',$inputs['video_projector'])
        ->where('mike_with_card',$inputs['mike_with_card'])
        ->where('cordless_hand_mike',$inputs['cordless_hand_mike'])
        ->where('cordless_collar_mike',$inputs['cordless_collar_mike'])
        ->where('laser_pointer',$inputs['laser_pointer'])
        ->where('data_of_event', $date)
        ->where('start_time',$inputs['start_time'])
        ->where('end_time',$inputs['end_time']);
        $event=Event::findOrFail($inputs['event_id']);*/
        if($registration)
        {
            Session::flash('success', 'Sorry! You Have Already Booked The Hall');     
            return redirect()->route('user_pages.book');  
        }
        else
        {
            $registrations=Registration::all()
            ->where('hall_id',$inputs['hall_id'])
            ->where('data_of_event', $date)
            ->where('start_time',$inputs['start_time'])
            ->where('end_time',$inputs['end_time']);
            foreach($registrations as  $registration) 
            {
                if($registration->event->priority > $event->priority)
                {
                    $this->rejectOtherRegistrations($registration);        
                }
            }  
            return $next($request);  
        }
        
    }
}
