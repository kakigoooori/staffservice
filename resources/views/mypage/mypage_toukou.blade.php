@extends('layout/layout')
@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href=/mypage>マイページ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href=/mypage/toukou>投稿一覧</a>
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

<h2>投稿一覧</h2>
<br/>
<p>自分が投稿した仕事です</p>

@if ($search->count())
 
<table class="table table-hover">
    <tr>
        <th>作業名</th>
        <th>値段</th>
        <th>ジャンル</th>
        <th>開始日</th>
        <th>完了納期</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($search as $menu)
    <tr>
        <td>{{ $menu->work }}</td>
        <td>{{ $menu->price }}</td>
        <td>{{ $menu->genre }}</td>
        <td>{{ $menu->start }}</td>
        <td>{{ $menu->end }}</td>
        <td><a href="/product/{{ $menu->id }}" class="btn btn-success">確認する</a></td>
        <td><a href="/mypool_edit/{{ $menu->id }}" class="btn btn-info">編集する</a></td>
        <td><a href="/mypool_delete/{{ $menu->id }}" class="btn btn-danger">削除する</a></td>
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif

@stop