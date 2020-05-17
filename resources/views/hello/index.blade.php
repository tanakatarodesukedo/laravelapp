@extends('layouts.helloapp')
<style>
    .pagination {
        font-size: 10pt;
    }

    .pagination li {
        display: inline-block;
    }

    #file-info th {
        background-color: red;
        padding: 10px;
    }

    #file-info td {
        background-color: #eee;
        padding: 10px;
    }

    tr th a:link,
    tr th a:visited,
    tr th a:hover,
    tr th a:active {
        color: white;
    }

    nav#pager {
        margin: 10px 0px 0px 10px;
    }

    body {
        padding: 10px;
    }
</style>
@section('title', 'Hello/Index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<pre>{{$msg}}</pre>

@if(Auth::check())
<p>USER: {{$user->name . ' (' . $user->email}})</p>
@else
<p>
    ※ログインしていません。(<a href="/login">ログイン</a> | <a href="/register">登録</a>)
</p>
@endif
<div id="main-table">
    @component('components.hello_table', ['items' => $items, 'sort' => $sort])
    @endcomponent
</div>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection

@section('script')
<script src="{{mix('js/app.js')}}"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function doAction() {
            const id = document.querySelector('#id').value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `/hello/json/${id}`, true);
            xhr.responseType = 'json';
            xhr.onload = function(e) {
                if (this.status === 200) {
                    const result = this.response;
                    document.querySelector('#name').textContent = result.name;
                    document.querySelector('#mail').textContent = result.mail;
                    document.querySelector('#age').textContent = result.age;
                }
            };
            xhr.send();
        }
    });
</script>
@endsection