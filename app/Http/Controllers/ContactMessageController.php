<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facedes\Response;

use App\ContactMessage;
use App\Events\MessageSend;

class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view('frontend.info.contact');   
    }
    
    public function postSendMessage(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required|max:100',
            'subject' => 'required|max:140',
            'message' => 'required|min:10'
        ]);
        
        $message = new ContactMessage();
        
        $message->email = $request['email'];
        $message->sender = $request['name'];
        $message->subject = $request['subject'];
        $message->body = $request['message'];
        $message->save();
        
        Event::fire(new MessageSend($message));
        
        return redirect()->route('contact')->with(['success' => 'Message successfully sent!']);
    }
    
    public function getContactMessageIndex()
    {
        $contact_messages = ContactMessage::orderBy('created_at', 'desc')->paginate(5);
        
        return view('admin.info.contact_messages', ['contact_messages' => $contact_messages]);
    }
    
    public function getDeleteMessage($message_id)
    {
        $contact_message = ContactMessage::find($message_id);
        $contact_message->delete();
        
        return Response(['message' => 'Message deleted!'], 200);
    }
}