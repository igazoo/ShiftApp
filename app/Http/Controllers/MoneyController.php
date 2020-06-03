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
        $moneys = DB::table('moneys')->all()->get();
        return view('money.index',compact('moneys'));
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

        $shift_dates = [];

        //シフトのdateだけに分ける
        $shifts = DB::table('shifts')->get();

        foreach($shifts as $shift){
          $shift_dates = $shift->date;

        }


        $money = new Money;

        //取得日付
        $input_date = $request->input('date');
        //取得した日付の年
        $input_year = $input_date->year;
        //取得した日付の月
        $input_month = $input_date->month;

        //取得した日付とシフトテーブルを比較し、一致した日付があれば月と年を保存する
        foreach($shift_dates as $shift_date){
          if($input_date == $shift_date){
            $money->year = $input_year;
            $money->month = $input_month;
          }

          //選択された従業員のid保存
          $money->member_id = $request->input('member_id');
          $sum_money = [];

            foreach($shifts as $shift){
              if($money->member_id == $shift->member_id){
                $sum_money[]= $shift->money;
              }
            }

           $money->month_money =array_sum($sum_money);

           $money->save();
           return redirect('money/index');
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
