@extends('layout/layout')
@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href=/mypage>マイページ</a>
  </li>
</ul>

<h2>登録内容変更</h2>
<br/>
<div class="container">

<div class="row">
<div class="col-sm-6">
<div class="card" >

<a href="/mypage/edit/{{ Auth::id() }}">登録内容変更</a>

<p>{{ Auth::user()->name }}さんの登録内容を変更する</P><br>

</div>
</div>


<div class="col-sm-6">
<div class="card" >
<a href=/mypage/receive>メールアドレス変更</a>
<p>{{ Auth::user()->name }}さんのメールアドレスの変更はこちらからです</P><br>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
<div class="card" >
<a href=/mypage/delete>アカウント削除</a>
<p>{{ Auth::user()->name }}さんのアカウントの削除をはこちらから行います</P><br>
      
</div>
</div>

<div class="col-sm-6">
<div class="card" >
<a href=/mypage/changepassword>パスワード変更</a>
<p>{{ Auth::user()->name }}さんのパスワードを変更します</P><br>
</div>
</div>


</div>
</div>
@stop