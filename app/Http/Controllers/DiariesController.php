<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class DiariesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // If it's an AJAX request from DataTables
            if (Auth::user()->role_id == 1) {
                $diaries = Diary::all();
            } else if (Auth::user()->role_id == 2) {
                $supervisorId = Auth::user()->id;
    
                $diaries = Diary::where(function ($query) use ($supervisorId) {
                    $query->where('supervisor_id', $supervisorId)
                        ->orWhere('author_id', $supervisorId);
                })->get();
            } else {
                $diaries = Diary::where('author_id', '=', Auth::user()->id)->get();
            }
    
            return DataTables::of($diaries)
                ->addIndexColumn()
                ->addColumn('actions', function ($data) {
                    $actions = '<a href="' . route('diaries.show', $data->id) . '" class="btn btn-sm btn-info">View</a>';
                    // Add other action buttons if needed
                    return $actions;
                })
                ->addColumn('title', function ($data) {
                    $date = $data->created_at->format('F j, Y');
                    $author = User::where('id', '=', $data->author_id)->first();
                    if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2) {
                        return $title = 'EOD Report for ' . $date . ' by ' . $author->name;
                    } else {
                        return $title = 'EOD Report for ' . $date;
                    }
                })
                ->addColumn('status', function ($data) {
                    // ... (your status column logic)
                })
                ->rawColumns(['actions', 'title', 'status'])
                ->make(true);
        }
    
        // For the initial page load
        $diaries = Diary::all(); // Fetch all diaries for the view
        return view('admin.diaries.index')->with('diaries', $diaries);
    }
    

    public function create()
    {
        $supervisors = User::where('role_id', 2)->get();
        return view('admin.diaries.create', compact('supervisors'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'plan_today' => 'required',
                'end_today' => 'required',
                'plan_tomorrow' => 'required',
                'roadblocks' => 'required',
                'summary' => 'required',
                'supervisor_id' => 'required',
                'status' => 'required|in:1,2',
            ]);

            $diary = Diary::create($validatedData + ['author_id' => Auth::user()->id]);

            return redirect()->route('diaries.index')->with('success', 'Diary entry created successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diary = Diary::with('supervisor')->findOrFail($id);

        return view('admin.diaries.view', compact('diary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
