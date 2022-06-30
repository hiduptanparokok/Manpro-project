<?php

namespace App\Http\Controllers;

use App\Abouts;
use App\Portofolios;

use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        $about = Abouts::latest()->paginate(1)->appends(request()->except('page'));

        return view('about', compact('about'));
    }

    public function portofolio()
    {
        $porto = Portofolios::latest()->paginate(9)->appends(request()->except('page'));
        return view('portofolio', compact('porto'));
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
