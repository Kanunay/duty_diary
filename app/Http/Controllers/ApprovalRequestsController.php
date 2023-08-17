<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Diary;

use Illuminate\Http\Request;

class ApprovalRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Fetch data from diaries table
        $diaries = Diary::latest()->get();

        // Fetch data from users table
        $users = User::all();


        return view('admin.approval_request.index', compact('diaries', 'users'));
    }

        public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        
        $diary = Diary::find($id);

        if (!$diary) {
            return response()->json(['success' => false], 404);
        }

        // Update the status to 2
        $diary->status = 2;
        $diary->save();

        return response()->json(['success' => true], 200);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
