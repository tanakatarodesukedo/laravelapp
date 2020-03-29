@extends('layouts.common')

@section('title', 'Video | 風景写真家「SNAPPERS」')

@section('bodyId', 'video')

@section('wrapCls', 'clearfix')

@section('content')
<div class="main">
  <h1>Video</h1>
  <p>これまでに撮影した映像作品を掲載しています。</p>
  <section id="movie">
    <h2 class="icon">Movie</h2>
    <iframe width="700" height="394" src="https://www.youtube.com/embed/alxWC-kNemc?start=69" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </section>
  <section id="short-film">
    <h2 class="icon">Short film</h2>
    <iframe width="700" height="394" src="https://www.youtube.com/embed/sBBZop5j6D0?start=36" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </section>
</div>

@include('components.sidebar')

@endsection