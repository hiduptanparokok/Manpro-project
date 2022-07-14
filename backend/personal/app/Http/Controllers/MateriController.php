<?php

namespace App\Http\Controllers;

use App\Materi;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::latest()->paginate(9)->appends(request()->except('page'));
        return view('admin.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'desc' => 'required|min:5',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $materi = $request->file('file');
        $file = time() . "_" . $materi->getClientOriginalName();

        $feed_upload = 'filemateri';
        $materi->move($feed_upload, $file);

        Materi::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'file' => $file,
        ]);

        return redirect()->route('admin.materi')->with(['success.up' => 'event: ' . $request->title . ' Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materi = Materi::find($id);

        return view('admin.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'desc' => 'required|min:5',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $materi = Materi::findOrFail($id);

        $file_materi = $request->file('file');
        // dd($photo->getClientOriginalName());
        if (!$file_materi) {
            abort(405);
        }
        $file = time() . "_" . $file_materi->getClientOriginalName();

        $feed_upload = 'filemateri';

        $file_materi->move($feed_upload, $file);

        $materi->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'file' => $file,
        ]);

        return redirect()->route('admin.materi')->with(['success.up' => 'Added']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete = Materi::findOrFail($id);
        $delete->delete();

        return redirect()->back()->with(['success.down' => 'success.up: Deleted!']);
    }
}
