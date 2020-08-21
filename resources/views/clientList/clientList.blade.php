@extends('layout/layout')
@section('content')    
   
<h1>クライアント一覧</h1>
 
<form action="/clientList" method="GET">
<table class="table table-hover">

<tr>
    <th>クライアント名</th>
    <th>所在地</th>
    <th>電話番号</th>
    <th>職種</th>
</tr>

<tr>
    <th>
    <input type="text" name="name" value="{{$name}}">
    </th>

    <th>
    <input type="text" name="add02" value="{{$add02}}">
    </th>
   
    <th>
    <input type="text" name="tel" value="{{$tel}}">
    </th>

    <th>
    <input type="text" name="genre" value="{{$genre}}">
    </th>
    
</tr>               

</table>
    <p><input type="submit" value="検索する"  class="btn btn-warning"></p>

</form>

@if ($clientList->count())
 
<table class="table table-hover">
    <tr>
        <th>クライアント名</th>
        <th>都道府県</th>
        <th>電話番号</th>
        <th>職種</th>
        
    </tr>
    @foreach ($clientList as $menu)
    <tr>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->add02}}</td>
        <td>{{ $menu->tel }}</td>
        <td>{{ $menu->genre}}</td>
        <td><a href="/clientMore/{{ $menu->id }}" class="btn btn-success">確認する</a></td>
        <td><a href="/client_edit/{{ $menu->id }}" class="btn btn-info">編集する</a></td>
        <td><a href="/client_delete/{{ $menu->id }}" class="btn btn-danger">削除する</a></td>
        <th></th>
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif

@stop