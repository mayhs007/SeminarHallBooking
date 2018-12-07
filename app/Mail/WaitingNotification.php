<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WaitingNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $registered_user;
    private $registered_event;
    private $registered_hall;
    private $registered_club;
    private $registered_date;
    private $registered_start_time; 
    private $registered_end_time;
    public function __construct ($registered_user,$registered_event,$registered_hall,$registered_club,$registered_date, $registered_start_time, $registered_end_time)
    {
        //
        $this->registered_user=$registered_user;
        $this->registered_event=$registered_event;
        $this->registered_hall=$registered_hall;
        $this->registered_club=$registered_club;
        $this->registered_date=$registered_date;
        $this->registered_start_time=$registered_start_time; 
        $this->registered_end_time=$registered_end_time;
        
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seminar Hall Booking')->view('mailer.waiting')
        ->with('registered_user', $this->registered_user)->with('hall',$this->registered_hall)
        ->with('event',$this->registered_event)->with('registered_date',$this->registered_date)
        ->with('registered_start_time',$this->registered_start_time)->with('registered_end_time',$this->registered_end_time)
        ->with('club',$this->registered_club);
    }
}
