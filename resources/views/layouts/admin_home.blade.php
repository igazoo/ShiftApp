<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/shift.css') }}" rel="stylesheet">

  <style>
  body{background-color: #59CFB5; }

  .time {
    position: relative;
    display: inline-block;
    width: 200px;
    height: 36px;
    border: 2px solid #ccc;
    border-radius: 15px;
  }
  input[type="date"] {
    position: relative;
    padding: 0 10px;
    width: 200px;
    height: 36px;
    border: 0;
    background: transparent;
    box-sizing: border-box;
    font-size: 14px;
    color: #000;
  }

  input[type="date"]::-webkit-inner-spin-button{
    -webkit-appearance: none;
  }
  input[type="date"]::-webkit-clear-button{
    -webkit-appearance: none;
  }
  a{
    color:rgba(89, 94, 89, 0.76);
    text-decoration: none;
  }
  a:hover{
    color:#59CFB5;
    text-decoration: none;
  }


  </style>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/admin/home') }}">
          {{ 'Home' }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <li class="nav-item">
              <a class="nav-link" href="{{ route('shift.index') }}">{{ __('シフト一覧') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('shift.wait_shift') }}">{{ __('申請待ちシフト一覧') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.index') }}">{{ __('従業員') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('money.index') }}">{{ __('給料') }}</a>
            </li>


          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>

</body>
</html>
