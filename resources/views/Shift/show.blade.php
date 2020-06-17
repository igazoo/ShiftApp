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
          <table class="table">
            <thead>
              <tr>
                <th scope="col">氏名</th>
                <th scope="col">日給</th>
                <th scope="col">変更</th>
                <th scope="col">削除</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @csrf
                <td>{{$user->name}}</td>
                <td>{{$shift->money}}円</td>
                <td>
                  @csrf
                  <a class="" href="{{route('shift.edit',['id'=>$shift->id])}}" method="get">
                  変更
                <td><form class="delete_btn" action="{{route('shift.destroy',['id' => $shift->id])}}" method="post" id ="delete_{{$shift->id}}">
                  @csrf
                  <a href="#" class="" data-id ="{{$shift->id}}" onclick="deletePost(this);">削除</a>
                </form></td>
                <td>
                  <a class="" href="{{route('shift.index')}}" method="get">
                    戻る
                  </a>
                </td>
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
