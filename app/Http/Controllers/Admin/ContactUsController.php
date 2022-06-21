<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts_us = ContactUs::oldest()->get();
        return view('admin.contact_us.index', compact('contacts_us'));
    }
    
    public function show(ContactUs $contact_us)
    {
        return view('admin.contact_us.show',compact('contact_us'));
    }
}
