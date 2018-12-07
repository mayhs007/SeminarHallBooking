<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;
class AdminPagesController extends Controller
{
    //
    function root(){
        $halls=Hall::all()->pluck('name','id')->sort()->toArray();
        return view('admin_pages.root')->with('halls',$halls);
    }
    function registeration(Request $request)
    {
        $registeration=Registeration::all();
        return view('admin_pages.registration')->with('registeration',$registeration);
    }
  
}
