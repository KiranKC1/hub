<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Subscriber;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    protected $subscriber;
    protected $content;
    protected $attachment;
    public $subject;

    public function __construct(Subscriber $subscriber,$content, $attachment,$subject)
    {
        $this->subscriber = $subscriber;
        $this->content = $content;
        $this->subject = $subject;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(!$this->attachment)
            return $this->subject($this->subject)->markdown('emails.newsletter')->with('subscriber',$this->subscriber)
                        ->with('content',$this->content);
        
        return $this->subject($this->subject)->markdown('emails.newsletter')->with('subscriber',$this->subscriber)
            ->with('content',$this->content)
            ->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getClientMimeType()
            ]);
    }
}
