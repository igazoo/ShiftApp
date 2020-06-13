@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">従業員一覧</div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <a class="btn btn-primary"href="{{route(('register'))}}">  新規従業員</a>


          <table class="table">
            <thead>
              <tr>
                <th scope="col">氏名</th>
                <th scope="col">性別</th>
                <th scope="col">種別</th>
                <th scope="col">詳細</th>
              </tr>
            </thead>
            <tbody>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  @if($user->gender ===0)
                  <td>男性</td>
                  @else
                  <td>女性</td>
                  @endif

                  @if($user->type ===1)
                  <td>社員</td>
                  @elseif($user->type ===2)
                  <td>大学生バイト</td>
                  @else
                  <td>高校生バイト</td>
                  @endif
                  <td><a href="{{route('user.show', ['id' => $user->id])}}">詳細</td>

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
