@extends('layouts.admin_home')

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
            <button type="submit" class="btn btn-success shift_btn">
              新規シフト申請
            </button>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">日付</th>
                <th>名前</th>
                <th scope="col">開始時間</th>
                <th scope="col">終了時間</th>
                <th scope="col">状態</th>
                <th scope="col">削除</th>
              </tr>
            </thead>
            <tbody>
              @foreach($shifts as $shift)
              @if($shift->status ===1)
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
                <td><a href="{{route('shift.show', ['id' => $shift->id])}}">詳細</td>

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
                  <td><a href="{{route('shift.user_edit', ['id' => $shift->id])}}">申請待ち</td>
                    <td><form  action="{{route('shift.destroy',['id' => $shift->id])}}" method="post" id ="delete_{{$shift->id}}">
                      @csrf
                      <a href="#"  data-id ="{{$shift->id}}" onclick="deletePost(this);">削除</a>
                    </form>
                  </td>
                  @endif
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
    <script>
    <!--
    /*******

    削除ボタンを押して一旦jsで確認メッセージを出す

    *******/
    //-->>
      function deletePost(e){
        'user strict';
        if(confirm('本当に削除してもいいですか？')){
          document.getElementById('delete_' + e.dataset.id).submit();
        }
      }
    </script>
    @endsection
