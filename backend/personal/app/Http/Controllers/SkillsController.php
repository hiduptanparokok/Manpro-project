<?php

namespace App\Http\Controllers;

use App\Skills;

use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skills::latest()->paginate(9)->appends(request()->except('page'));
        return view('admin.skills.index', compact('skills'));
    }

    public function create(Request $request)
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'percentage' => 'required|min:1',
        ]);

        Skills::create([
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('admin.skills')->with(['success.up' => 'event: '.$request->title.' Added']);
    }
   
    public function edit($id)
    {
        $skills = Skills::find($id);

        return view('admin.skills.edit', compact('skills'));
    }

  public function update(Request $request, $id)
  {

    $this->validate($request, [
        'name' => 'required|min:5',
        'percentage' => 'required|min:1',
    ]);

    $skills = Skills::findOrFail($id);

    $skills->update([
        'name' => $request->name,
        'percentage' => $request->percentage,
    ]);

    return redirect()->route('admin.skills')->with(['success.up' => 'Added']);
  }

  public function delete($id)
  {
    $delete = Skills::findOrFail($id);
  	$delete->delete();

  	return redirect()->back()->with(['success.down' => 'success.up: Deleted!']);
  }
}
