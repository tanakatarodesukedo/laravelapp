@extends('layouts.common')

@section('title', 'Portfolio | 風景写真家「SNAPPERS」')

@section('bodyId', 'portfolio')

@section('wrapCls', 'clearfix')

@section('content')
<div class="main">
  <h1>Portfolio</h1>
  <p>これまでに撮影した写真や映像作品を掲載しています。</p>
  <section>
    <h2>
      <a href="{{route('snappers.photograph')}}">
        <img src="{{asset('images/portfolio-photo.jpg')}}" alt="PHOTOGRAPH" />
      </a>
    </h2>
    <p>
      SNAPPERSでは「街-City」「海-Beach」「森-Forest」の3つの場所で、
      様々な角度から「人の気配」を撮影します。人が写っていない写真の中にも確かにそこにある、
      人の気配を感じとっていただけると嬉しいです。
      <a href="{{route('snappers.photograph')}}">詳しくみる ≫</a>
    </p>
  </section>
  <section>
    <h2>
      <a href="{{route('snappers.video')}}">
        <img src="{{asset('images/portfolio-video.jpg')}}" alt="VIDEO" />
      </a>
    </h2>
    <p>
      SNAPPERSでは映像作品も撮影しております。ドローンでの空撮やアクションカメラを使用した、
      屋外でのダイナミックな映像を得意としています。またショートフィルムを映画祭などで上映することもあります。
      <a href="{{route('snappers.video')}}">詳しくみる ≫</a>
    </p>
  </section>
</div>

@include('components.sidebar')

@endsection