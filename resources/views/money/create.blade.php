@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">給料計算</div>

          <div class="card-body">
            <form method="post" action="{{route('money.store')}}">
              @csrf
              <div class="cp_ipselect">
                <select name="year"class="cp_sl06" required>
                  <option value={{$now_year}}>{{$now_year}}年</option>
                  <option value={{$now_year}} - 1>{{$now_year - 1}}年</option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
                <label class="cp_sl06_selectlabel">年</label>
              </div>

              <div class="cp_ipselect">
                <select name="month"class="cp_sl06" required>
                  <option value={{$now_month}}>{{$now_month}}月</option>
                  <option value={{$now_month}} - 1>{{$now_month - 1}}月</option>
                  <option value={{$now_month}} - 1>{{$now_month - 2}}月</option>
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
                <label class="cp_sl06_selectlabel">月</label>
              </div>

              <div class="cp_ipselect">
                <select name="user_id"class="cp_sl06" required>
                  <option value="" hidden disabled selected></option>
                  @foreach ($users as $user)
                  <option value={{$user->id}}>{{$user->name}}</option>
                  @endforeach
                </select>
                <span class="cp_sl06_highlight"></span>
                <span class="cp_sl06_selectbar"></span>
                <label class="cp_sl06_selectlabel">従業員名</label>
              </div>
              <div class="shift_create_btn">
                <input class="btn btn-success" type="submit" value="計算する"id ="shift_btn">
              </div>
          </form>

           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
