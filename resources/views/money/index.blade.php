@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">給料</div>

          <div class="card-body">
            <form  action="{{route('money.create')}}" method="get">
              @csrf
              <button type="submit" class = "btn btn-success money_create_btn">従業員給料計算</button>
            </form>
          </form>
          <table class="table">
            @csrf
            <thead>
              <tr>
                <th scope="col">年</th>
                <th scope="col">月</th>
                <th scope="col">名前</th>
                <th scope="col">給料</th>
              </tr>
            </thead>
            <?php $id =[]; ?>
            @foreach ($moneys as $money)
            <?php $id[]= $money->id; ?>
            <?php $max_id = max($id); ?>
            @if($money->id == $max_id)
            <?php $money_member_id = $money->user_id; ?>
            @endif

            <tbody>
              @foreach($users as $user)
              @if($user->id === $money_member_id)
              <tr>
                <td>{{$money->year}}</td>
                <td>{{$money->month}}</td>
                <td>{{$user->name}}</td>
                <td>{{$money->month_money}}円</td>
              </tr>
              @endif
              @endforeach

            </tbody>
            @endforeach

          </table>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
