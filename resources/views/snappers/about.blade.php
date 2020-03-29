@extends('layouts.common')

@section('title', 'About | 風景写真家「SNAPPERS」')

@section('bodyId', 'about')

@section('content')
<div class="main-center">
  <h1>About</h1>
  <p>SNAPPERS代表、山田太郎のプロフィールや経歴の紹介ページです。</p>
  <section class="profile clearfix">
    <div class="profile-txt">
      <h2 class="icon">Profile</h2>
      <p><span>SNAPPERS 代表：山田 太郎</span><br />
        アナログ、デジタルを問わず、トイカメラやポラロイド、ビデオカメラに至るまで、
        あらゆるカメラに夢中になって遊んでいるうちに自然とカメラマンとしての道を志すようになる。<br />
        大学卒業後、有名カメラマンのアシスタントを経て渡米。世界各国を放浪しながら撮影をする中で、
        現在のアウトドアカメラマンとしてのスタイルを確立する。2016年に帰国し、「SNAPPER」を設立。<br />
        現在は、雑誌の表紙やカタログの撮影を中心に、
        映像作品などにもカメラマンとして参加するなど幅広く活躍している。
      </p>
    </div>
    <img src="{{asset('images/about-profile.png')}}" alt="山田太郎のプロフィール画像" class="profile-image" />
  </section>
  <section class="career">
    <h2 class="icon">Career and Job history</h2>
    <table>
      <tr>
        <th>1994年3月</th>
        <td>
          丸三角芸術大学写真科 卒業　服部写真研究所に入社、服部英明氏に師事
        </td>
      </tr>
      <tr>
        <th>2002年3月</th>
        <td>
          服部写真研究所を退社し渡米、世界各国を放浪しながら撮影を続ける
        </td>
      </tr>
      <tr>
        <th>2012年8月</th>
        <td>
          イタリア・ミラノで開催されたコンクールにて、審査員特別賞受賞
        </td>
      </tr>
      <tr>
        <th>2016年1月</th>
        <td>
          帰国し「SNAPPERS」を設立
        </td>
      </tr>
      <tr>
        <th>2016年4月</th>
        <td>
          Aichi Musiumにて初の写真展「Snap!Snap!」を開催
        </td>
      </tr>
    </table>
  </section>
</div>
@endsection