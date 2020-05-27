@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form  action="{{route('member.index')}}" method="get">
                      <button type="submit" class="btn btn-success">
                        メンバー一覧
                      </button>
                    </form>
                    <form  action="{{route('shift.create')}}" method="get">
                      <button type="submit" class="btn btn-info">
                        シフト
                      </button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
