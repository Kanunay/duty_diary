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
            $data = Diary::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="' . route('diaries.show', $row->id) . '" class="btn btn-sm btn-info">View</a>';
                         $btn .= '<a href="' . route('diaries.print', $row->id) . '" class="btn btn-sm btn-warning text-white ml-2">Print</a>'; 

                        
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin.diaries.index');
    }
    

    public function create()
    {
        $supervisors = User::where('role_id', 2)->get();
        return view('admin.diaries.create', compact('supervisors'));
    }

    public function store(Request $request)
    {
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

    public function print($id)
    {
        $diary = Diary::with('supervisor')->findOrFail($id);

        return view('admin.diaries.print', compact('diary'));
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
