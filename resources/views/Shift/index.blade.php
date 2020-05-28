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

              <tr>
                @foreach($members as $member)
                @if($member->id == $shift->member_id)
                <td>{{$member->name}}</td>
                @endif
                @endforeach
                <td>{{$shift->date}}</td>
                <td>{{$shift->start_time}}</td>
                <td>{{$shift->end_time}}</td>
                <td><a href="{{route('shift.show', ['id' => $shift->id])}}">詳細</td>

              </tr>
              @endforeach

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
