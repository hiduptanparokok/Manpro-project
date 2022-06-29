<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function portofolio()
    {
        return view('portofolio');
    }

    public function event()
    {
        return view('event');
    }

    public function schedule()
    {
        return view('schedule');
    }

    public function contact()
    {
        return view('contact');
    }


}
