<html>

<head>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>@yield('title')</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
            margin: 5px;
        }

        h1 {
            font-size: 50pt;
            text-align: right;
            color: #f6f6f6;
            margin: -20px 0px -30px 0px;
            letter-spacing: 4pt;
        }

        ul {
            font-size: 12pt;
        }

        hr {
            margin: 25px 100px;
            border-top: dashed 1px #ddd;
        }

        .menutitle {
            font-size: 14pt;
            font-weight: bold;
            margin: 0px;
        }

        .content {
            margin: 10px;
        }

        .footer {
            text-align: right;
            font-size: 10pt;
            margin: 10px;
            border-bottom: solid 1px #ccc;
            color: #ccc;
        }

        th {
            background-color: #999;
            color: fff;
            padding: 5px 10px;
        }

        td {
            border: solid 1px #aaa;
            color: #999;
            padding: 5px 10px;
        }
    </style>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('js/jquery-3.5.0.min.js')}}"></script>
</head>

<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">※メニュー</h2>
    <ul>
        <li>
            @show
        </li>
    </ul>
    <hr size="1" />
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>

    @yield('script')

</body>

</html>