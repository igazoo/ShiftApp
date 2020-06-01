@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">従業員</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          編集画面
          <form  action="{{route('member.update',['id' => $member->id])}}" method="post">
            @csrf
            氏名
            <input type="text" name="name" value="{{$member->name}}">
            <br>
            性別
            <input type="radio" name="gender"value=0 @if($member->gender ===0)checked @endif>男性
            <input type="radio" name="gender"value=1 @if($member->gender ===1)checked @endif>女性
            <br>
            年齢
          <select  name="type">
            <option value="">選択してください</option>
            <option value="1" @if($member->type ===1)selected @endif>社員</option>
            <option value="2" @if($member->type ===2)selected @endif>大学生バイト</option>
            <option value="3" @if($member->type ===3)selected @endif>高校生バイト</option>
          </select>
            <input class="btn btn-info" type="submit" value="更新する">
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
