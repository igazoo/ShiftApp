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

          日給　{{$shift->money}}円
          <?php if($shift->status ==2): ?>
          申請済
        <?php endif ?>

          <form class="" action="{{route('shift.edit',['id'=>$shift->id])}}" method="get">
            @csrf
            <input type="submit" class="btn btn-info" value="変更">
          </form>
          <form  action="{{route('shift.destroy',['id' => $shift->id])}}" method="post" id ="delete_{{$shift->id}}">
            @csrf
            <a href="#" class="btn btn-danger" data-id ="{{$shift->id}}" onclick="deletePost(this);">削除</a>
          </form>
          <form class="" action="{{route('shift.index')}}" method="get">
            @csrf
            <input type="submit" name="" value="戻る"　class="btn btn-success">
          </form>


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
