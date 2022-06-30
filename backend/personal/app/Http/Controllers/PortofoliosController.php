<?php

namespace App\Http\Controllers;

use App\Portofolios;
use Illuminate\Http\Request;

class PortofoliosController extends Controller
{
    public function index()
    {
        $porto = Portofolios::latest()->paginate(9)->appends(request()->except('page'));
        return view('admin.porto.index', compact('porto'));
    }

    public function create(Request $request)
    {
        return view('admin.porto.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'desc' => 'required|min:5',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5408',
        ]);

        $photo = $request->file('photo');
        $file = time()."_".$photo->getClientOriginalName();

        $feed_upload = 'pictportos';
        $photo->move($feed_upload, $file);

        Portofolios::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'photo' => $file,
        ]);

        return redirect()->route('admin.porto')->with(['success.up' => 'event: '.$request->title.' Added']);
    }
   
    public function edit($id)
    {
        $porto = Portofolios::find($id);

        return view('admin.porto.edit', compact('porto'));
    }

  public function update(Request $request, $id)
  {

    $this->validate($request, [
        'title' => 'required|min:5',
        'desc' => 'required|min:5',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5408',
    ]);

    $porto = Portofolios::findOrFail($id);

    $photo = $request->file('photo');
    // dd($photo->getClientOriginalName());
    if (!$photo) {
        abort(405);
    }
    $file = time()."_".$photo->getClientOriginalName();

    $feed_upload = 'pictportos';
    $photo->move($feed_upload, $file);

    $porto->update([
        'title' => $request->title,
        'desc' => $request->desc,
        'photo' => $file,
    ]);

    return redirect()->route('admin.porto')->with(['success.up' => 'Added']);
  }

  public function delete($id)
  {
    $delete = Portofolios::findOrFail($id);
  	$delete->delete();

  	return redirect()->back()->with(['success.down' => 'success.up: Deleted!']);
  }
}
