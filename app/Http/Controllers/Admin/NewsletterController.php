<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Rules\NoEmptyContent;
use Mail;
use App\Subscriber;
use Auth;

class NewsletterController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }

    public function newsletter()
    {
        return view('admin.newsletter');
    }

    public function newsletterSend(Request $request)
    {   
        $request->validate(array(
            'subject'=>'max:255',
            'message'=>['required', new NoEmptyContent]
        ));

        $subject = '';
        $attachment = '';
        
        if($request->hasFile('attachment')){
            $attachment = $request->file('attachment');
        }

        if($request->subject){
            $subject = $request->subject;
        }

        foreach(Subscriber::all() as $subscriber){
            Mail::to($subscriber->email)->send(new Newsletter($subscriber,$request->message,$attachment,$subject));
                        
        }

        $request->session()->flash('success', 'Newsletter sent.');
    
        return redirect()->route('newsletter');
    }
}
