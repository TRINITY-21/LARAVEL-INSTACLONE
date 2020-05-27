<?php

namespace App\Http\Controllers;

use App\Mail\ContactsMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function create(){

    	return view('contacts.create');
    }


    public function store(){

    	$data = Request()->validate([
    		'name' => 'required',
    		'email' => 'required',
    		'message' => 'required',

    		]);

    	// Send Mail

    	Mail::to('agyr@a.com')->send(
    		new ContactsMail($data));

    	$session = session()->flash('success', 'Message sent');

    	return redirect('contact')->with($session);
    }

}
