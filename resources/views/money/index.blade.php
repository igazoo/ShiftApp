@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">給料</div>

          <div class="card-body">
            {{$moneys->month_money}}

          </form>

           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
