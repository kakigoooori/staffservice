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
    <a class="nav-link" href=/mypage/chat/{{ Auth::user()->id }}>メッセージ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/receive>受信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/send>送信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href=/mypage/change>登録内容変更</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/profile>プロフィール</a>
  </li>
</ul>

<h2>登録内容変更</h2>
<br/>
<div class="container">

<div class="row">
<div class="col-sm-6">
<div class="card" >

<a href="/mypage/edit/{{ Auth::id() }}">登録内容変更</a>

<p>{{ Auth::user()->nickname }}さんの登録内容を変更する</P><br>

</div>
</div>


<div class="col-sm-6">
<div class="card" >
<a href=/mypage/receive>メールアドレス変更</a>
<p>{{ Auth::user()->nickname }}さんのメールアドレスの変更はこちらからです</P><br>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
<div class="card" >
<a href=/mypage/delete>退会処理</a>
<p>{{ Auth::user()->nickname }}さんの退会処理をはこちらから行います</P><br>
      
</div>
</div>

<div class="col-sm-6">
<div class="card" >
<a href=/mypage/changepassword>パスワード変更</a>
<p>{{ Auth::user()->nickname }}さんのパスワードを変更します</P><br>
</div>
</div>


</div>
</div>
@stop