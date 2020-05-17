<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>
    @section('title')
    サンプルページ
    @show
  </title>
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('kumavicon.ico')}}" rel="shortcut icon" />
  <script src="{{asset('js/jquery-3.5.0.min.js')}}"></script>
</head>

<body id="@yield('bodyId')">
  <!-- header開始 -->
  <header>
    <div class="logo">
      <a href="{{route('snappers.index')}}">
        <img src="{{asset('images/logo.png')}}" alt="Hattori design labo" />
      </a>
    </div>
    <nav>
      <ul class="global-nav">
        <li><a href="{{route('snappers.portfolio')}}">Portfolio</a></li>
        <li><a href="{{route('snappers.about')}}">About</a></li>
        <li><a href="{{route('snappers.contact')}}">Contact</a></li>
      </ul>
    </nav>
  </header>
  <!-- header終了 -->

  <!-- wrap開始 -->
  <div id="wrap" class="@yield('wrapCls')">
    <div class="content">
      @yield('content')
    </div>
  </div>
  <!-- wrap終了 -->

  <!-- footer開始 -->
  <footer>
    <small>(C)2020 Hattori-studio.</small>
  </footer>
  <!-- footer終了 -->

  @yield('script')

</body>

</html>