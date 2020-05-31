@extends('layouts.app_admin')

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

          <form class="form-inline my-2 my-lg-0" action="{{route('shift.index')}}" method="get">
            <input class="form-control mr-sm-2" type="date" placeholder="Search" aria-label="検索" name ="date">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
          </form>

          <form  action="{{route('shift.create')}}" method="get">
            <button type="submit" class="btn btn-primary">
              新規シフト追加
            </button>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th>名前</th>
                <th scope="col">日付</th>
                <th scope="col">開始時間</th>
                <th scope="col">終了時間</th>

                <th scope="col">詳細</th>
              </tr>
            </thead>
            <tbody>

              @foreach($shifts as $shift)
              @if($shift->date == $search_date)
              <tr>
                @foreach($members as $member)
                @if($member->id == $shift->member_id)
                <td>{{$member->name}}</td>
                @endif
                @endforeach
                <td>{{$shift->date}}</td>
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
                <td><a href="{{route('shift.show', ['id' => $shift->id])}}">詳細</td>

              </tr>
              @endif

              @endforeach


            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
