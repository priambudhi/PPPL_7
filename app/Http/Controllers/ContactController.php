<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function store(Request $request){
        $validated = $request->validateWithBag('contactStore', [
            'name'=>['required'],
            'email'=>['required'],
            'phone_number'=>['required'],
            'booking_date'=>['required'],
            'jumlah_orang'=>['required'],
        ]);
        $validated['booking_date'] = date('Y-m-d H:i:s',strtotime($request->booking_date));
        Contact::create($validated)->save();
        return back()->with('msg-success','Berhasil Booking!');
        
    }
}
