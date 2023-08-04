<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\Auth;

class DocumentationsController extends Controller
{
    public function index()
    {
        $documentations = Documentation::all();
        return view('admin.documentation.index', compact('documentations'));
    }

    public function create()
    {
        return view('admin.documentation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
    
        $documentation = new Documentation([
            'author_id' => Auth::id(),
            'image' => $imagePath,
            'caption' => $request->input('caption'),
        ]);
    
        $documentation->save();
    
        return redirect()->route('documentation.index')
            ->with('success', 'Documentation created successfully!');
    }
    public function show($id)
    {
        // 
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    } 

    public function destroy($id)
    {
        $documentation = Documentation::findOrFail($id);
        $documentation->delete();

        return redirect()->route('documentations.index')->with('success', 'Documentation deleted successfully!');
        
    }
}
