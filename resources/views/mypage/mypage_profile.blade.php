@extends('layout/layout')
@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href=/mypage>マイページ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/toukou>投稿一覧</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/chat>メッセージ</a>
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
    <a class="nav-link  active" href=/mypage/profile>プロフィール</a>
  </li>
</ul>

<h2>相手からみたあなたのプロフィールです</h2>
<br />
<div class="container">
<div class="row">
<div class="col-sm-8">
<div class="card" >
<br />
<div class="card-header">
<h4>『{{ Auth::user()->nickname }}』</h4>
</div>


<!--画像表示-->
                       
@if(Auth::user()->image == null)
<figure>
<img src="/storage/images/base.jpg" width="150px" height="150px">

</figure>
@else
<figure>
<img src="/storage/images/{{ Auth::id() }}.jpg" width="150px" height="150px">

</figure>
@endif

<h5> {{ Auth::user()->area}}/{{ Auth::user()->gender }}性</h5>
<div class="card-header">
<h5>自己紹介コメント</h5>
</div>
<div class="card" >
      {!! nl2br(e( Auth::user()->note ))!!}
        </div>


</div>
</div>
</div>
プロフィール変更はこちらから
<td><a href="/mypage/change" class="btn btn-success">変更する</a></td>
</div>
@stop