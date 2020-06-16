@extends('layouts.admin_home')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('新規従業員登録') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>

            <div class="cp_ipselect">
              <select name="type"class="cp_sl06" required>
                <option value="" hidden disabled selected></option>
                <option value="">選択してください</option>
                <option value=1>社員</option>
                <option value=2>大学生バイト</option>
                <option value=3>高校生バイト</option>
              </select>
              <span class="cp_sl06_highlight"></span>
              <span class="cp_sl06_selectbar"></span>
              <label class="cp_sl06_selectlabel">種別</label>
            </div>

            <div class="radio-button-container text-center ">
              <div class="radio-button-label ">性別</div>
              <div class="contents " >
                <div class="radio-buttons ">
                  <input id="one" type="radio" name="gender" value=0 checked>
                  <label for="one">男性</label>
                </div>
                <div class="radio-buttons">
                  <input id="two" type="radio" name="gender" value=1>
                  <label for="two">女性</label>
                </div>
              </div>
            </div>
            <div class="shift_create_btn ">
                <button type="submit" class="btn btn-success"id="shift_btn">
                  {{ __('新規従業員登録') }}
                </button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
