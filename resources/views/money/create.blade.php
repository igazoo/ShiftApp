@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">給料計算</div>

          <div class="card-body">
            <form method="post" action="route{{'money.store'}}">
              @csrf
              <lavel>
                 <input type="date" name="date" />
              </label>
              <select  name="member_id">
                @foreach ($members as $member)
                <option value={{$member->id}}>{{$member->name}}</option>
                @endforeach
              </select>
              <input class="btn btn-info" type="submit" value="登録する">

          </form>

           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
