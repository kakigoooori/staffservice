@extends('layout/layout')
@section('content')    
   
<h1>案件一覧</h1>
 
<form action="/clientMatter" method="GET">
<table class="table table-hover">




@if ($clientMatter->count())
 
<table class="container-fluid">
    <tr>
    <th style="width:100px;">案件名</th>
    <th style="width:100px;">月額報酬</th>
    <th style="width:100px;">案件掲載開始</th>
    <th style="width:100px;">　掲載終了</th>

    <th style="width:100px;"></th>
    </tr>
    @foreach ($clientMatter as $menu)
    <tr>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->price}}</td>
        <td>{{ $menu->start }}</td>
        <td>{{ $menu->end}}</td>
        <td><a href="/clientworkMore/{{ $menu->id }}" class="btn btn-success">確認</a></td>
        <td><a href="/clientworksEdit/{{ $menu->id }}" class="btn btn-info">編集</a></td>
        <td><a href="/clientwork_delete/{{ $menu->id }}" class="btn btn-danger">削除</a></td>
        
        
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif

@stop