@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">シフト申請画面</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          申請確認画面　変更可能
          <form  action="{{route('shift.user_update',['id' => $shift->id])}}" method="post">
            @csrf
            {{$user->name}}
            <label >
              日付
              <input type="date" name="date" value="{{$shift->date}}">
            </label>
            <br>
            <label>
            開始時間
            <input type="time" name="start_time" value="{{$shift->start_time}}">
            <datalist id="data1">
            <option value="08:00"></option>
            <option value="09:00"></option>
            <?php for($i=1;$i <= 24; $i++): ?>
            <option value="<?php echo $i.':00' ?>"></option>
            <?php endfor; ?>
            </datalist>
            </label>
            <br>
            <label >終了時間
              <input type="time"  list="data2" name="end_time"　value="{{$shift->end_time}}">
              <datalist id="data2">
              <option value="08:00"></option>
              <option value="09:00"></option>
              <?php for($i=1;$i <= 24; $i++): ?>
              <option value="<?php echo $i.':00' ?>"></option>
              <?php endfor; ?>
              </datalist>

            </label>
            <input type="hidden" name="status" value=2>

            <input class="btn btn-info" type="submit" value="申請する">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
