<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $event = Events::latest()->paginate(9)->appends(request()->except('page'));
        return view('admin.event.index', compact('event'));
    }

    public function create(Request $request)
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:5',
            'link' => 'required|min:5',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5408',
        ]);

        $photo = $request->file('photo');
        $file = time()."_".$photo->getClientOriginalName();

        $feed_upload = 'pictevent';
        $photo->move($feed_upload, $file);

        Events::create([
            'title' => $request->title,
            'content' => $request->content,
            'link' => $request->link,
            'photo' => $file,
        ]);

        return redirect()->route('admin.events')->with(['success.up' => 'event: '.$request->title.' Added']);
    }
   
    public function edit($id)
    {
        $event = Events::find($id);

        return view('admin.event.edit', compact('event'));
    }

  public function update(Request $request, $id)
  {

    $this->validate($request, [
        'title' => 'required|min:5',
        'content' => 'required|min:5',
        'link' => 'required|min:5',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5408',
    ]);

    $event = Events::findOrFail($id);

    $photo = $request->file('photo');
    // dd($photo->getClientOriginalName());
    if (!$photo) {
        abort(405);
    }
    $file = time()."_".$photo->getClientOriginalName();

    $feed_upload = 'pictevent';
    $photo->move($feed_upload, $file);

    $event->update([
        'title' => $request->title,
        'content' => $request->content,
        'link' => $request->link,
        'photo' => $file,
     ]);

    return redirect()->route('admin.events')->with(['success.up' => 'Added']);
  }

  public function delete($id)
  {
    $delete = Events::findOrFail($id);
  	$delete->delete();

  	return redirect()->back()->with(['success.down' => 'success.up: Deleted!']);
  }
}
