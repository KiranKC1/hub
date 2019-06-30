<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactUsMessageReply;
use App\Rules\NoEmptyContent;
use Mail;
use App\ContactUsMessage;
use Auth;

class ContactUsMessageController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin_user');
    }

    public function index(){
        $contact_messages = ContactUsMessage::orderBy('created_at','desc')->paginate(10);
        return view('admin.contact_messages.index')->with('contacts',$contact_messages)->with('state','all');
    }

    public function unseenMsg(){
        $contact_messages = ContactUsMessage::where('seen','0')->orderBy('created_at','desc')->paginate(10);
        return view('admin.contact_messages.index')->with('contacts',$contact_messages)->with('state','unseen');
    }

    public function show($id)
    {
        $Contact = ContactUsMessage::find($id);

        if(!$Contact)
            abort(404);

        if(!$Contact->seen){
            $Contact->seen = 1;
            $Contact->save();
        }
        
        return view('admin.contact_messages.show')->with('contact',$Contact);
    }

    public function destroy($id,Request $request)
    {
        $Contact = ContactUsMessage::find($id);
        if(!$Contact)
            abort(404);
        $Contact->delete();

        $request->session()->flash('success', 'Message deleted');
        return redirect()->route('contact-us-messages.index');
    }

    public function reply($id)
    {
        $Contact = ContactUsMessage::find($id);
        if(!$Contact)
            abort(404);
        
        return view('admin.contact_messages.reply')->with('contact',$Contact);
    }

    public function replySend(Request $request, $id)
    {   
        $request->validate(array(
            'subject'=>'max:255',
            'message'=> ['required', new NoEmptyContent]
        ));

        $subject = $request->subject;
        $attachment = '';

        if($request->hasFile('attachment')){
            $attachment = $request->file('attachment');
        }

        $Contact = ContactUsMessage::find($id);
        if(!$Contact)
            abort(404);

        Mail::to($Contact->email)->send(new ContactUsMessageReply($request->message,$attachment,$subject));            

        $request->session()->flash('success', 'Reply sent.');
    
        return redirect()->route('contact-us-messages.show',$Contact->id);
    }

    public function getUnseenMsgCount(Request $request){
        
        if ($request->ajax()){
            $mno = ContactUsMessage::where('seen','0')->count();
            return response()->json(['mno' => $mno]);
        }
        abort(404);  
    }

    public function getUnseenMsg(Request $request){
        if ($request->ajax()){
            $messages = ContactUsMessage::where('seen','0')->latest()->limit(5)->get();
            $mno = ContactUsMessage::where('seen','0')->count();
            $view = view('admin.partials.mnotis')->with('messages',$messages)->with('mno',$mno)->render();
            
            return response()->json(['html' => $view, 'mno' => $mno]);
        }
        abort(404);
    }
}
