<?php

namespace App\Http\Controllers;

use App\Abouts;
use App\Portofolios;
use App\Skills;
use App\Events;
use App\Materi;

use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $about = Abouts::latest()->paginate(1)->appends(request()->except('page'));
        $porto = Portofolios::latest()->paginate(3)->appends(request()->except('page'));
        $event = Events::latest()->paginate(3)->appends(request()->except('page'));
        $materi = Materi::latest()->paginate(3)->appends(request()->except('page'));
        return view('index', compact('about', 'porto', 'event', 'materi'));
    }

    public function about()
    {
        $about = Abouts::latest()->paginate(1)->appends(request()->except('page'));
        $skills = Skills::latest()->paginate(9)->appends(request()->except('page'));

        return view('about', compact('about', 'skills'));
    }

    public function portofolio()
    {
        $porto = Portofolios::latest()->paginate(9)->appends(request()->except('page'));
        return view('portofolio', compact('porto'));
    }

    public function event()
    {
        $event = Events::latest()->paginate(9)->appends(request()->except('page'));
        return view('event', compact('event'));
    }

    public function materi()
    {
        $materi = Materi::latest()->paginate(9)->appends(request()->except('page'));
        return view('materi', compact('materi'));
    }

    public function contact()
    {
        return view('contact');
    }
}
