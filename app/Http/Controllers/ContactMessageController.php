<?php

namespace App\Http\Controllers;

class ContactMessageController extends Controller
{
    public function getContactIndex()
    {
        return view('frontend.info.contact');   
    }
}