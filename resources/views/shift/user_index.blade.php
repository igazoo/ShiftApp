@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">シフト一覧</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <form class="form-inline my-4" action="{{route('shift.user_index')}}" method="get">
            <input class="form-control mr-sm-2" type="date" placeholder="Search" aria-label="検索" name ="date">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">日付</th>
                <th>名前</th>
                <th scope="col">開始時間</th>
                <th scope="col">終了時間</th>
                <th scope="col">状態</th>
              </tr>
            </thead>
            <tbody>
              @foreach($shifts as $shift)
              @if($shift->date == $search_date)
              <tr>
                <td>検索日付{{$shift->date}}</td>
                @foreach($users as $user)
                @if($user->id == $shift->user_id)
                <td>{{$user->name}}</td>
                @endif
                @endforeach
                <?php
                $start =  strtotime($shift->start_time);
                $start_hour = idate('H',$start);
                ?>
                <td>{{$start_hour}}時</td>
                <?php
                $end =  strtotime($shift->end_time);
                $end_hour = idate('H',$end);
                ?>
                <td>{{$end_hour}}時</td>
                <?php if($shift->status ===1): ?>
                  <td>未決定</td>
                <?php else :?>
                  <td>決定</td>
                <?php endif; ?>
              </tr>

              @elseif($today == $shift->date)

              <tr>
                <td>{{$shift->date}}</td>
                @foreach($users as $user)
                @if($user->id == $shift->user_id)
                <td>{{$user->name}}</td>
                @endif
                @endforeach

                <?php
                $start =  strtotime($shift->start_time);
                $start_hour = idate('H',$start);
                ?>
                <td>{{$start_hour}}時</td>
                <?php
                $end =  strtotime($shift->end_time);
                $end_hour = idate('H',$end);
                ?>
                <td>{{$end_hour}}時</td>
                <?php if($shift->status ===1): ?>
                  <td>未決定</td>
                <?php else :?>
                  <td>決定</td>
                <?php endif; ?>
                @endif
                @endforeach
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
