<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMessageReply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $content;
    protected $attachment;
    public $subject;

    public function __construct($content, $attachment, $subject)
    {
        $this->content = $content;
        $this->subject = $subject;
        $this->attachment = $attachment;
    }
   
    private function setMailConfig()
    {
        
        $existing = config('mail');
        $new =array_merge(
            $existing, [
            'host' => 'mail.projectincube.com',
            'port' => 465,
            'from' => [
                'address' => 'support@projectincube.com',
                'name' => 'ShresthaAT Support Team',
                ],
            'encryption' => 'ssl',
            'username' => 'support@projectincube.com',
            'password' => 'iHq73f2aS2',
            ]);

        config(['mail'=>$new]); 
    }

    public function build()
    {
        // $this->setMailConfig();
        if(!$this->attachment)
            return $this->from('support@projectincube.com')->subject($this->subject)->view('emails.contactreply')->with('content',$this->content);
    
        return $this->subject($this->subject)->view('emails.contactreply')->with('content',$this->content)
            ->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getClientMimeType()
            ]);
    }
}
