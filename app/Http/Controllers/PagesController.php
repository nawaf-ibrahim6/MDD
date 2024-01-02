<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return redirect('/login');
    }

    public function dashboard(){
        return view('dashboard');
    }
}
