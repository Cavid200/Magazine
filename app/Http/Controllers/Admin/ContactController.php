<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactStoreRequest;
use App\Http\Requests\Admin\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $contact->phone=$request->phone;
        $contact->email = $request->email;
        $contact->map = $request->map;
        $contact->address = $request->address;
        $contact->save();

        $notification = [
            "message" => "Ugurla Redakte olundu",
            "alert-type" => "success"
        ];
        return redirect()->route('admin.contact.edit',$contact)->with($notification);
    }
}
