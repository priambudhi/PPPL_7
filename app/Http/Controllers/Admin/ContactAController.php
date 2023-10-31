<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactAController extends Controller
{
    function index(){
        $datas = Contact::get();
        return view('admin.contact.index',['datas'=>$datas]);
    }
}
