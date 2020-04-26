@extends('layouts.helloapp')
<style>
    .pagination {
        font-size: 10pt;
    }

    .pagination li {
        display: inline-block;
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
</style>
@section('title', 'Index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
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
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@endsection