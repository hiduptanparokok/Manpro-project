<?php

namespace App\Http\Controllers;

use App\Abouts;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $hasData = Abouts::first();
        $about = Abouts::latest()->paginate(1)->appends(request()->except('page'));
        return view('admin.about.index', compact('about', 'hasData'));
    }

    public function create(Request $request)
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'desc' => 'required|min:5',
        'birthday' => 'required|date',
        'website' => 'required|min:5',
        'phone' => 'required|min:5',
        'city' => 'required|min:5',
        'age' => 'required|min:1',
        'degree' => 'required|min:5',
        'email' => 'required|min:5',
        'work' => 'required|min:5',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5408',
        ]);

        $photo = $request->file('photo');
        $file = time()."_".$photo->getClientOriginalName();

        $feed_upload = 'pictabouts';
        $photo->move($feed_upload, $file);

        Abouts::create([
            'desc' => $request->desc,
            'birthday' => $request->birthday,
            'website' => $request->website,
            'phone' => $request->phone,
            'city' => $request->city,
            'age' => $request->age,
            'degree' => $request->degree,
            'email' => $request->email,
            'work' => $request->work,
            'photo' => $file,
        ]);

        return redirect()->route('admin.about')->with(['success.up' => 'event: '.$request->title.' Added']);
    }
   
    public function edit($id)
    {
        $about = Abouts::find($id);

        return view('admin.about.edit', compact('about'));
    }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
        'desc' => 'required|min:5|nullable',
        'birthday' => 'required|date|nullable',
        'website' => 'required|min:5|nullable',
        'phone' => 'required|min:5|nullable',
        'city' => 'required|min:5|nullable',
        'age' => 'required|min:1|nullable',
        'degree' => 'required|min:5|nullable',
        'email' => 'required|min:5|nullable',
        'work' => 'required|min:5|nullable',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5408',
    ]);

    $about = Abouts::findOrFail($id);

    $photo = $request->file('photo');
    // dd($photo->getClientOriginalName());
    if (!$photo) {
        abort(405);
    }
    $file = time()."_".$photo->getClientOriginalName();

    $feed_upload = 'pictabouts';
    $photo->move($feed_upload, $file);

    $about->update([
        'desc' => $request->desc,
        'birthday' => $request->birthday,
        'website' => $request->website,
        'phone' => $request->phone,
        'city' => $request->city,
        'age' => $request->age,
        'degree' => $request->degree,
        'email' => $request->email,
        'work' => $request->work,
        'photo' => $file,
    ]);

    return redirect()->route('admin.about')->with(['success.up' => 'Added']);
  }

  public function delete($id)
  {
    $delete = Abouts::findOrFail($id);
  	$delete->delete();

  	return redirect()->back()->with(['success.down' => 'success.up: Deleted!']);
  }

}
