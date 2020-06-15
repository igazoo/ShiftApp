@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">シフト作成</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="card-body">
            <form method="post" action="{{route('shift.store')}}">
              @csrf
              <div class="form-group row">
                <label for="datepicker" class="col-md-4 col-form-label text-md-right">日付</label>
                <div class="col-md-6"  id="date_picker">
                  <Datepicker
                  v-model="defaultDate"
                  :format="DatePickerFormat"
                  :language="ja"
                  name="date">
                </Datepicker>
              </div>
            </div>
            <div class="cp_ipselect">
              <select name="start_time"class="cp_sl06" required>
                <option value="" hidden disabled selected></option>
                <?php for($i=9;$i <= 20; $i++): ?>
                  <option value="<?php echo $i.':00' ?>"><?php echo $i.':00' ?></option>
                  <option value="<?php echo $i.':30' ?>"><?php echo $i.':30' ?></option>

                <?php endfor; ?>
              </select>
              <span class="cp_sl06_highlight"></span>
              <span class="cp_sl06_selectbar"></span>
              <label class="cp_sl06_selectlabel">開始時間</label>
            </div>

            <div class="cp_ipselect">
              <select name="end_time"class="cp_sl06" required>
                <option value="" hidden disabled selected></option>
                <?php for($i=10;$i <= 21; $i++): ?>
                  <option value="<?php echo $i.':00' ?>"><?php echo $i.':00' ?></option>
                  <option value="<?php echo $i.':30' ?>"><?php echo $i.':30' ?></option>

                <?php endfor; ?>
              </select>
              <span class="cp_sl06_highlight"></span>
              <span class="cp_sl06_selectbar"></span>
              <label class="cp_sl06_selectlabel">終了時間</label>
            </div>

            <div class="cp_ipselect">
              <select  name="user_id" class="cp_sl06" required>
                @foreach ($users as $user)
                <option value={{$user->id}}>{{$user->name}}</option>
                @endforeach
              </select>
              <span class="cp_sl06_highlight"></span>
              <span class="cp_sl06_selectbar"></span>
              <label class="cp_sl06_selectlabel">従業員</label>
            </div>
            <input type="hidden" name="status" value=2>
            <div class="shift_create_btn">
              <input class="btn btn-info" type="submit" value="登録する"　id ="shift_btn">
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
