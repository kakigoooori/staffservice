@extends('layout/layout')
@section('content')

{{ csrf_field() }}
<div class="container">
<div class="row">
<div class="col-sm-8">
<div class="card" >

  <div class="card-header">
  <h2>{{ $input['name'] }}</h2>
  </div>
  <table class="table">
  <tr>
    <td>フリガナ</td>
    <td>
    {{ $input['name_kana'] }}
    </td>
  </tr>

  <tr>
    <td>メールアドレス</td>
    <td>
    {{ $input['email'] }}
    </td>
  </tr>

  <tr>
    <td>事業所名</td>
    <td>
    {{ $input['office_name'] }}
    </td>
  </tr>

  <tr>
    <td>所在地</td>
    <td>
    {{ $input['add01'] }}
    {{ $input['add02'] }}
    {{ $input['add03'] }}
    </td>
  </tr>
  
  <tr>
    <td>電話番号</td>
    <td>
    {{ $input['tel'] }}
    </td>
  </tr>

  <tr>
    <td>url</td>
    <td>
    {{ $input['url'] }}
    </td>
  </tr>

  <tr>
    <td>契約締結日</td>
    <td>
    {{ $input['date'] }}
    </td>
  </tr>
  
  <tr>
    <td>職種</td>
    <td>
    {{ $input['genre'] }}
    </td>
  </tr>

  </table>

  <table class="table">
  <tr>
    <td>
      <h5>備考欄</h5>
        <div class="card" >{!! nl2br(e( $input['note'] ))!!}
        </div>
    </td>
  </tr>
  </table>
  <p><a class="btn btn-primary" href=/csv/downloadclient/{{$input['id'] }} target="_blank"> クライアント情報CSV化</a></p>

<td>
   <a href="/clientWorks/{{$input['id'] }}" class="btn btn-primary" value="">
   このクライアントの案件登録する
    </a>

{{ csrf_field() }}








</td>
</tr>
</table>

<h2>投稿一覧</h2>
<br/>
<p>自分が投稿した仕事です</p>

@if ($client->count())
 
<table class="table table-hover">
    <tr>
        <th>案件名</th>
        <th>値段</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($client as $menu)
    <tr>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->price }}</td>
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