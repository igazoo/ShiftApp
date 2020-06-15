@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">下書きシフト作成</div>

          <div class="card-body">
            <form method="post" action="{{route('shift.user_store')}}">
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
              <select  name="user_id">

                <option value={{$user->id}}>{{$user->name}}</option>

              </select>
              <input type="hidden" name="status" value=1>
              <input class="btn btn-info" type="submit" value="申請する">


          </form>

           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
