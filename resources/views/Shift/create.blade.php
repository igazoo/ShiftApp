@extends('layouts.app_admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">シフト作成</div>

          <div class="card-body">
            <form method="" action="">
              <lavel>
                 <input type="date" />
              </label>

              <label class="time">開始時間
                  <input type="time"  list="data1">
                  <datalist id="data1">
                  <option value="08:00"></option>
                  <option value="09:00"></option>
                  <?php for($i=1;$i <= 24; $i++): ?>
                  <option value="<?php echo $i.':00' ?>"></option>
                  <?php endfor; ?>
                  </datalist>

                </label>
              <label class="time">終わり時間
                <input type="time"  list="data2">
                <datalist id="data2">
                <option value="08:00"></option>
                <option value="09:00"></option>
                <?php for($i=1;$i <= 24; $i++): ?>
                <option value="<?php echo $i.':00' ?>"></option>
                <?php endfor; ?>
                </datalist>

              </label>


              <select class="" name="">
                @foreach ($members as $member)
                <option value={{$member->id}}>{{$member->name}}</option>
                @endforeach

              </select>
          </form>

           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
