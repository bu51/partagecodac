<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $ads=auth()->user()->ads;
        return view('dashboard',compact('ads'));
    }
}
