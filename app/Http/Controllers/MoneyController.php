<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use App\Models\Shift;
use App\Models\Member;
use Illuminate\Support\Facades\DB;


class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $members = DB::table('members')
        ->select('id','name')
        ->get();

        return view('money.create',compact('members'));

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
        $shifts = Shift::all();
        $shift_dates = [];

        //シフトのdateだけに分ける
        foreach($shifts as $shift){
          $shift_date[] = $shift->date;
        }

        //シフトの従業員idだけに分ける
        $shifts_member_id = [];
        foreach($shifts as $shift){
          $shifts_member_id[] = $shift->id;
        }


        $money = new Money;

        //取得日付
        $input_date = $request->input('date');
        //取得した日付の年
        $input_year = $input_date->year;
        //取得した日付の月
        $input_day = $input_date->month;

        //取得した日付とシフトテーブルを比較し、一致した日付があれば月と年を保存する
        foreach($shift_dates as $shift_date){
          if($input_date == $shift_date){
            $money->year = $input_date->year;
            $money->month = $input_date->month;
          }

          //選択された従業員のid保存
          $money->member_id = $request->input('member_id');

          // $sum_money = [];
          // foreach($shifts_member_id as $shift_member_id){
          //   if($shift_member_id == $money->member_id){
          //
          //   }
          // }





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
