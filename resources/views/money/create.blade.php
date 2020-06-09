@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">給料計算</div>

          <div class="card-body">
            <form method="post" action="{{route('money.store')}}">
              @csrf
              <select  name="year">
                <option value={{$now_year}}>{{$now_year}}年</option>
                <option value={{$now_year}} - 1>{{$now_year - 1}}年</option>
              </select>
              <select  name="month">
                <option value={{$now_month}}>{{$now_month}}月</option>
                <option value={{$now_month}} - 1>{{$now_month - 1}}月</option>
                <option value={{$now_month}} - 1>{{$now_month - 2}}月</option>
              </select>
              <select  name="member_id">
                @foreach ($members as $member)
                <option value={{$member->id}}>{{$member->name}}</option>
                @endforeach
              </select>



              <input class="btn btn-info" type="submit" value="計算する">

          </form>

           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
