@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <ul>
        @each('components.item', $data, 'item')
    </ul>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
