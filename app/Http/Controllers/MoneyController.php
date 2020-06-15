<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use App\Models\Shift;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



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
        $moneys = DB::table('money')->get();


        $users = DB::table('users')->get();


        return view('money.index',compact('moneys', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $now = Carbon::now();
        $now_year = $now->year;
        $now_month = $now->month;

        $users = DB::table('users')
        ->select('id','name')
        ->get();


        return view('money.create',compact('users' ,'now_year' ,'now_month'));

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

      $money = new Money ;

      $money->year = $request->input('year');
      $money->month = $request->input('month');


      $money->user_id = $request->input('user_id');
      $m = $money->user_id;

      $shifts = DB::table('shifts')->where('status',2)->get();
      $money_array = [];

      foreach($shifts as $shift){
        $shift_date = Carbon::parse($shift->date);
        //既存の年、月、member_idが入力されたものと一緒ならば既存のシフトのmoneyを配列にいれる
        if($shift_date->year == $money->year && $shift_date->month == $money->month && $shift->user_id == $m){
          $money_array[] = $shift->money;
        }
      }

      //moneyの配列の合計　月の給料の合計
      $sum =array_sum($money_array);
      $money->month_money  = $sum;

      //もし入力した従業員のidが存在してたら削除して重複しないようにする　常にMoneyテーブルには従業員のそれぞれのデータは一つのみ
      $exit_moenys = Money::where('user_id',$money->user_id)->delete();


      $money->save();
      return  redirect('money/index');

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
