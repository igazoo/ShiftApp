@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">従業員</div>


          詳細
        {{$user->name}}
        {{$gender}}
        {{$type}}

  
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
