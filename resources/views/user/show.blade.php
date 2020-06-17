@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">従業員詳細</div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">氏名</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">連絡先</th>
                <th scope="col">種別</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @csrf
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$type}}</td>
              </tr>
            </tbody>
          </table>

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
