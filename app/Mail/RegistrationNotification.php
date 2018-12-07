<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user;
    private $hall;
    private $event;
    private $club;
    private $date;
    private $start_time;
    private $end_time;
    private $status;
    public function __construct($user,$event,$hall,$club,$date,$start_time,$end_time,$status)
    {
        $this->user = $user;
        $this->hall=$hall; 
        $this->event=$event; 
        $this->club=$club; 
        $this->date=$date;
        $this->start_time=$start_time;
        $this->end_time=$end_time; 
        $this->status=$status;  

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seminar Hall Booking')->view('mailer.registration')
        ->with('user', $this->user)->with('hall',$this->hall)
        ->with('event',$this->event)->with('date',$this->date)
        ->with('start_time',$this->start_time)->with('end_time',$this->end_time)
        ->with('club',$this->club)->with('status',$this->status);
    }
}
