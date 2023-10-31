<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\MenuCategory;

class PortalController extends Controller
{
    function welcome(){
        $items = MenuItem::paginate(5);
        return view('welcome',['items'=>$items]);   
    }
    function menu(){
        $menus = MenuCategory::has('MenuItem')->get();
        return view('menu',['menus'=>$menus]);
    }
}
