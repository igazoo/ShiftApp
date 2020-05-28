<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = DB::table('members')
        ->select('id','name')
        ->get();

        $shifts =  DB::table('shifts')
         ->select('id','date','start_time','end_time','member_id')
         ->orderBy('created_at','desc')
         ->get();



        return view('shift.index',compact('shifts', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $members = Member::all();
        return view('shift.create',compact('members'));
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
        $shift = new Shift;
        $shift->date = $request->input('date');
        $shift->start_time = $request->input('start_time');
        $shift->end_time = $request->input('end_time');
        $shift->member_id = $request->input('member_id');

        $shift->save();
        return redirect('shift/index');
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
        $shift = Shift::find($id);

        return view('shift.show', compact('shift'));
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
        $shift = Shift::find($id);

        return view('shift.edit', compact('shift'));
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
        $shift = Shift::find($id);

        $shift->date = $request->input('date');
        $shift->start_time = $request->input('start_time');
        $shift->end_time = $request->input('end_time');
        $shift->save();
        return redirect('shift/index');
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
