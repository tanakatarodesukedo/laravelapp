@extends('layouts.common')

@section('title', '風景写真家「SNAPPERS」Official Website')

@section('bodyId', 'index')

@section('content')
<h1>Hi! I'm Monkichi,<br />a Freelance designer based in Japan.</h1>
<p>
  このWebサイトは日本で活動するフリーランスWebデザイナー・モン吉のポートフォリオサイトです。<br />
  これまでに制作した作品や、デザイナーとして携わったプロジェクトなどを掲載しています。
  どうぞごゆっくりご覧ください。
</p>
<p class="btn"><a href="{{route('snappers.portfolio')}}">My Portfolio</a></p>
@endsection