@extends('layouts.admin_home')


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">シフト変更</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <form  action="{{route('shift.user_update',['id' => $shift->id])}}" method="post">
            @csrf
            <div class="user_name">
              <p class="user_p">氏名</p>
              <p class="user_p_2">{{$user->name}}</p>
            </div>
            <div class="form-shift row">
              <label for="datepicker" class="col-md-4 col-form-label text-md-right">日付</label>
              <div class="col-md-6"  id="date_picker">
                <Datepicker
                v-model="defaultDate"
                :format="DatePickerFormat"
                :language="ja"
                name="date"
                value="{{$shift->date}}">
              </Datepicker>
            </div>
          </div>


            <div class="cp_ipselect">
              <select name="start_time"class="cp_sl06" required>
                <option value="{{$shift->start_time}}">{{ substr($shift->start_time, 0, 5) }}</option>
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
                <option value="{{$shift->end_time}}">{{substr($shift->end_time,0,5)}}</option>
                <?php for($i=9;$i <= 20; $i++): ?>
                  <option value="<?php echo $i.':00' ?>"><?php echo $i.':00' ?></option>
                  <option value="<?php echo $i.':30' ?>"><?php echo $i.':30' ?></option>

                <?php endfor; ?>
              </select>
              <span class="cp_sl06_highlight"></span>
              <span class="cp_sl06_selectbar"></span>
              <label class="cp_sl06_selectlabel">終了時間</label>
            </div>

            <input type="hidden" name="status" value=2>
            <div class="shift_create_btn">
              <input class="btn btn-success" type="submit" value="変更する" id="shift_btn">
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
