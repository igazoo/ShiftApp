@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">シフト作成</div>

          <div class="card-body">
            <form method="post" action="{{route('shift.store')}}">
              @csrf
              <lavel>
                 <input type="date" name="date" />
              </label>

              <label class="time">開始時間
                  <input type="time"  list="data1"name="start_time"　step="1800">
                  <datalist id="data1">
                  <option value="08:00"></option>
                  <option value="09:00"></option>
                  <?php for($i=1;$i <= 24; $i++): ?>
                  <option value="<?php echo $i.':00' ?>"></option>

                  <?php endfor; ?>
                  </datalist>

                </label>
              <label class="time">終わり時間
                <input type="time"  list="data2" name="end_time"　step="1800">
                <datalist id="data2">
                <option value="08:00"></option>
                <option value="09:00"></option>
                <?php for($i=1;$i <= 24; $i++): ?>
                <option value="<?php echo $i.':00' ?>"></option>
                <?php endfor; ?>
                </datalist>

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
