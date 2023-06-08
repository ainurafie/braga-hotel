<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;
    public $room_name;
    public $start_date;
    public $end_date;
    public $purpose;
    public $to_role;
    public $receiver_name;
    public $url;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $room_name, $start_date, $end_date, $purpose, $to_role, $receiver_name, $url, $status)
    {
        $this->user_name        = $user_name;
        $this->room_name        = $room_name;
        $this->start_date       = $start_date;
        $this->end_date         = $end_date;
        $this->purpose          = $purpose;
        $this->to_role          = $to_role;
        $this->receiver_name    = $receiver_name;
        $this->url              = $url;
        $this->status           = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->to_role == 'ADMIN') {
            if($this->status == 'DIBUAT') {
                return $this->subject('Request booking baru')->view('emails.booking');
            } elseif($this->status == 'BATAL') {
                return $this->subject('Request booking dibatalkan')->view('emails.booking');
            } elseif($this->status == 'DISETUJUI') {
                return $this->subject('Request booking berhasil disetujui')->view('emails.booking');
            } elseif($this->status == 'DITOLAK') {
                return $this->subject('Request booking berhasil ditolak')->view('emails.booking');
            } 
        } elseif($this->to_role == 'USER'){
            if($this->status == 'DIBUAT') {
                return $this->subject('Request booking berhasil dibuat')->view('emails.booking');
            } elseif($this->status == 'BATAL') {
                return $this->subject('Request booking berhasil dibatalkan')->view('emails.booking');
            } elseif($this->status == 'DISETUJUI') {
                return $this->subject('Selamat! Request booking kamu sudah disetujui')->view('emails.booking');
            } elseif($this->status == 'DITOLAK') {
                return $this->subject('Maaf, request booking kamu ditolak')->view('emails.booking');
            }
        } 
        return -1;
    }
}
