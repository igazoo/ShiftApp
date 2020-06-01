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

          1日の給料　{{$shift->money}}円

          <form class="" action="{{route('shift.edit',['id'=>$shift->id])}}" method="get">
            @csrf
            <input type="submit" class="btn btn-info" value="変更">
          </form>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection
