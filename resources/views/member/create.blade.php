@extends('layouts.app_admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif

          新規登録
          <form  action="{{route('member.store')}}" method="post">
            @csrf
            氏名
            <input type="text" name="name" >
            <br>
            性別
            <input type="radio" name="gender"value=0 >男性
            <input type="radio" name="gender"value=1 >女性
            <br>
            種別
            <select  name="type">
              <option value="">選択してください</option>
              <option value=1>社員</option>
              <option value=2>大学生バイト</option>
              <option value=3>高校生バイト</option>
            </select>

            <input class="btn btn-info" type="submit" value="登録する">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
