<?php 
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function build()
    {
        return $this->subject('Test d\'envoi d\'email')
                    ->view('emails.test');
    }
}
