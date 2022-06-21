<?php

namespace App\Http\Controllers\User;

use App\Models\Contact;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ContactUsRequest;

class ContactController extends Controller
{
    public function contact(){
        $contacts=Contact::oldest()->get();
        return view('user.contact.index',compact('contacts'));
    }
    public function post_contact(ContactUsRequest $request){
        $contact_us=new ContactUs();
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->phone = $request->phone;
        $contact_us->subject = $request->subject;
        $contact_us->message = $request->message;
        $contact_us->save();

        $notification=[
            "message"=>"Mesajınız uğurla gönderildi",
            "alert-type"=>"success"
        ];
        return redirect()->route('user.contact')->with($notification);
    }
}
