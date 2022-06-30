<?php
/**
 * app/Mail/NotificationMail.php
 *
 * Date-Time: 11.05.22
 * Time: 08:16
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $emailheaders;
    public function __construct($emailheaders)
    {
        //
        $this->emailheaders = $emailheaders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@damasakme.ge')->subject('DAMASAKME.GE')->view('emails.guestnotify');
    }
}
