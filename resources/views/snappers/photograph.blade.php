@extends('layouts.common')

@section('title', 'Photograph | 風景写真家「SNAPPERS」')

@section('bodyId', 'photograph')

@section('wrapCls', 'clearfix')

@section('content')
<div class="main">
  <h1>Design Works</h1>
  <p>これまでにデザイナーとして携わったウェブサイトや、その他の制作実績を掲載しています。</p>
  <section id="website">
    <h2 class="icon">Website</h2>
    <ul class="clearfix photograph-list">
      <li><img src="{{asset('images/photograph-city-01.png')}}" alt="Snafkins" /></li>
      <li><img src="{{asset('images/photograph-city-02.png')}}" alt="Template labo" /></li>
      <li><img src="{{asset('images/photograph-city-03.png')}}" alt="nekuraproject" /></li>
      <li><img src="{{asset('images/photograph-city-04.png')}}" alt="106hair" /></li>
      <li><img src="{{asset('images/photograph-city-05.png')}}" alt="ba sho" /></li>
      <li><img src="{{asset('images/photograph-city-06.png')}}" alt="hairshop green" /></li>
    </ul>
  </section>
  <section id="beach">
    <h2 class="icon">Beach</h2>
    <ul class="clearfix photograph-list">
      <li><img src="{{asset('images/photograph-beach-01.png')}}" alt="海水浴場" /></li>
      <li><img src="{{asset('images/photograph-beach-02.png')}}" alt="ビーチへ続く道" /></li>
      <li><img src="{{asset('images/photograph-beach-03.png')}}" alt="離れ小島" /></li>
      <li><img src="{{asset('images/photograph-beach-04.png')}}" alt="岩場と波" /></li>
      <li><img src="{{asset('images/photograph-beach-05.png')}}" alt="ヤシの木" /></li>
      <li><img src="{{asset('images/photograph-beach-06.png')}}" alt="波打ち際" /></li>
    </ul>
  </section>
  <section id="forest">
    <h2 class="icon">Forest</h2>
    <ul class="clearfix photograph-list">
      <li><img src="{{asset('images/photograph-forest-01.png')}}" alt="池と小舟" /></li>
      <li><img src="{{asset('images/photograph-forest-02.png')}}" alt="可憐な花" /></li>
      <li><img src="{{asset('images/photograph-forest-03.png')}}" alt="森の小径" /></li>
      <li><img src="{{asset('images/photograph-forest-04.png')}}" alt="清流をカップで掬う" /></li>
      <li><img src="{{asset('images/photograph-forest-05.png')}}" alt="焚き火台" /></li>
      <li><img src="{{asset('images/photograph-forest-06.png')}}" alt="新芽と若葉" /></li>
    </ul>
  </section>
</div>

@include('components.sidebar')

@endsection