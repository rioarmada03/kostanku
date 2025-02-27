<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::All();
        return view('contact', compact('contact'));
    }
}
