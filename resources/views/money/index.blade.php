@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">給料</div>

          <div class="card-body">
            <form  action="{{route('money.create')}}" method="get">
              <button type="submit" class = "btn btn-primary">新規登録</button>
            </form>
          </form>

           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
