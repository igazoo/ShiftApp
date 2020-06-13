<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; //追加
use App\Enums\PublishStatus;//追加


class ShiftController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    //
    //検索フォーム用
    $search_date = $request->input('date');
    $today = date("Y-m-d");

    $users = DB::table('users')
    ->select('id','name')
    ->get();

    $shifts =  DB::table('shifts')
    ->select('id','date','start_time', 'end_time', 'user_id','money')
    ->orderBy('start_time','asc')
    ->get();
      $status = PublishStatus::toSelectArray();


    return view('shift.index',compact('shifts', 'search_date','users','today','status'));
  }

  


  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
    $users = User::all();
    return view('shift.create',compact('users'));
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
    $shift->user_id = $request->input('user_id');
    //給料
    //開始時間と終了時間の差分と時給を掛け算してmoneyカラムに保存する
    $start =  strtotime($shift->start_time);
    $end =  strtotime($shift->end_time);
    //時給１０００円
    $hourly_wage = 1000;
    //開始時間と終了時間のhourだけ取り出す
    $start_hour = idate('H',$start);
    $end_hour = idate('H',$end);
    $hour = intval($end_hour) - intval($start_hour);
    //給料　＝　時間の差分　＊　時給　
    $shift->money = intval($hour) * $hourly_wage;
    $shift->month_money = $shift->money;

    //入力された日付データを月と年に分ける　
    $input_date = Carbon::parse($shift->date);
    $input_year = $input_date->year;
    $input_month = $input_date->month;

    //既存の従業員のid
    $input_user_id = $shift->user_id;
    $shift->status = $request->input('status');


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

    //給料
    //開始時間と終了時間の差分と時給を掛け算してmoneyカラムに保存する
    $start =  strtotime($shift->start_time);
    $end =  strtotime($shift->end_time);
    //時給変数　１０００円
    $hourly_wage = 1000;
    //開始時間と終了時間のhourだけ取り出す
    $start_hour = idate('H',$start);
    $end_hour = idate('H',$end);
    $hour = intval($end_hour) - intval($start_hour);
    //給料　＝　時間の差分　＊　時給　
    $shift->money = intval($hour) * $hourly_wage;


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

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */

  public function user_create(){
    // 現在ログインしているユーザー情報の取得
    $user = Auth::user();
    return view('shift.user_create',compact('user'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function user_store(Request $request)
  {
    $shift = new Shift;
    $shift->date = $request->input('date');
    $shift->start_time = $request->input('start_time');
    $shift->end_time = $request->input('end_time');
    $shift->user_id = $request->input('user_id');
    //給料
    //開始時間と終了時間の差分と時給を掛け算してmoneyカラムに保存する
    $start =  strtotime($shift->start_time);
    $end =  strtotime($shift->end_time);
    //時給１０００円
    $hourly_wage = 1000;
    //開始時間と終了時間のhourだけ取り出す
    $start_hour = idate('H',$start);
    $end_hour = idate('H',$end);
    $hour = intval($end_hour) - intval($start_hour);
    //給料　＝　時間の差分　＊　時給　
    $shift->money = intval($hour) * $hourly_wage;
    $shift->month_money = $shift->money;

    //入力された日付データを月と年に分ける　
    $input_date = Carbon::parse($shift->date);
    $input_year = $input_date->year;
    $input_month = $input_date->month;

    //既存の従業員のid
    $input_user_id = $shift->user_id;
    $shift->status = $request->input('status');


    $shift->save();
    return redirect('/home');
  }
}
