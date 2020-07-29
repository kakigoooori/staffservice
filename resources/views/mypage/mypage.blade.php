@extends('layout/layout')
@section('content')


<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href=/mypage>マイページ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/toukou>投稿一覧</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/chat/{{ Auth::user()->id }}>メッセージ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/receive>受信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/send>送信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/change>登録内容変更</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/profile>プロフィール</a>
  </li>
</ul>
<br />
<h2>マイページTOP</h2>
<br />
<div class="container">
<div class="row">
<div class="col-sm-12">
  <div class="card">
<p>ログイン中のユーザーは</p>
<br />
{{ Auth::user()->nickname }}です<br /><br />

@if(Auth::user()->image == null)
<figure>
<img src="{{ asset('/img/base.jpg')}}" width="100px" height="100px">
<figcaption>デフォルト画像です</figcaption>
</figure>
@else
<figure>
<img src="/storage/images/{{ Auth::id() }}.jpg" width="100px" height="100px">
</figure>
@endif




</div>
</div>
</div>
</div>
@stop
