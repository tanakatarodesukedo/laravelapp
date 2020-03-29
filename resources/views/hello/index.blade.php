@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>必要なだけ記述できます。</p>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection

<!-- <html>

<head>
    <title>Hello/Index</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 50pt;
            text-align: right;
            color: #eee;
            margin: -20px 0px -30px 0px;
        }
    </style>
</head>

<body>
    <h1>Blade/Index</h1>
    <p>&#064;whileディレクティブの例</p>
    <ol>
        @php
            $counter = 0;
        @endphp
        @while ($counter < count($data))
            <li>{{$data[$counter]}}</li>
            @php
                $counter++;
            @endphp
        @endwhile
        @for ($i = 1; $i < 100; $i++)
            @if ($i % 2 == 1)
                @continue
            @elseif ($i <= 10)
                <li>No, {{$i}}</li>
            @else
                @break
            @endif
        @endfor
    </ol>
    @foreach ($data as $item)
        @if ($loop->first)
            <p>※データ一覧</p>
            <ul>
        @endif
        <li>No,{{$loop->iteration}}. {{$item}}</li>
        @if ($loop->last)
            </ul><p>――ここまで</p>
        @endif
    @endforeach
    @isset ($msg)
        <p>こんにちは、{{$msg}}さん。</p>
    @else
        <p>何か書いて下さい。</p>
    @endisset
    <form method="post" action="/hello">
        @csrf
        <input type="text" name="msg" />
        <input type="submit" />
    </form>
</body>

</html> -->