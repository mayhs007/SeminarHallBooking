<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    //
    function root(){

        return view('admin_pages.root');
    }
}
