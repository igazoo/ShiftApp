@extends('layouts.app_admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">新規従業員</div>

        <!-- <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif -->

          <!-- @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif -->

          詳細
        {{$member->name}}
        {{$gender}}
        {{$type}}

        <form   action="{{route('member.edit',['id' => $member->id])}}" method="get">
          @csrf
          <input type="submit" class="btn btn-info" value="変更">
        </form>

        <form  action="{{route('member.destroy',['id' => $member->id])}}" method="post" id ="delete_{{$member->id}}">
          @csrf
          <a href="#" class="btn btn-danger" data-id ="{{$member->id}}" onclick="deletePost(this);">削除</a>
        </form>


        </div>
      </div>
    </div>
  </div>
</div>

<script >
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
