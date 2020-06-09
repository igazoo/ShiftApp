@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">給料</div>

          <div class="card-body">
            <form  action="{{route('money.create')}}" method="get">
              <button type="submit" class = "btn btn-primary">従業員給料計算</button>
            </form>
          </form>
          <table class="table">
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
            <?php $money_member_id = $money->member_id; ?>
            @endif

            <tbody>
              @foreach($members as $member)
              @if($member->id === $money_member_id)
              <tr>
                <td>{{$money->year}}</td>
                <td>{{$money->month}}</td>
                <td>{{$member->name}}</td>
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
