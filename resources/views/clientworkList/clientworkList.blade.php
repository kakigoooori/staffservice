@extends('layout/layout')
@section('content')    
   
<h1>案件一覧</h1>
 
<form action="/clientworkList" method="GET">
<table class="table table-hover">

<tr>
    <th>案件名</th>
    <th>月額報酬</th>
    <th>開発開始</th>
 
    <th>業界</th>
</tr>


<tr>
    <th>
    <input type="text" name="name" value="{{$name}}">
    </th>

    <th>
    <input type="text" name="price" value="{{$price}}">
    </th>
   
    <th>
    <input type="text" name="start" value="{{$start}}">
    </th>

    <th>
    <input type="" name="add02" value="{{$add02}}">
    </th>
</tr>

<tr>
    <th>都道府県</th>
    <th>使用言語</th>
    <th>必須スキル</th>
    <th>歓迎スキル</th>
    
</tr>

<tr>

    <th>
    <input type="" name="genre" value="{{$genre}}">
    </th>

    <th>
    <input type="" name="tool" value="{{$tool}}">
    </th>

   

    <th>
    <input type="" name="required_skill" value="{{$required_skill}}">
    </th>

    <th>
    <input type="" name="Welcome_skills" value="{{$Welcome_skills}}">
    </th>



    
</tr>               

</table>
    <p><input type="submit" value="検索する"  class="btn btn-warning"></p>

</form>

@if ($clientworkList->count())
 
<table class="container-fluid">
    <tr>
    <th style="width:300px;">案件名</th>
    <th style="width:100px;">月額報酬</th>
    <th style="width:100px;">開発開始</th>
    <th style="width:100px;">業界</th>
    <th style="width:100px;">都道府県</th>
    <th style="width:100px;">使用言語</th>
    <th style="width:100px;">詳細ページ</th>
    <th style="width:100px;">編集</th>
    <th style="width:100px;">削除</th>
        
    </tr>
    @foreach ($clientworkList as $menu)
    <tr>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->price}}</td>
        <td>{{ $menu->start }}</td>
        <td>{{ $menu->genre }}</td>
        <td>{{ $menu->add02}}</td>
        <td>{{ $menu->tool }}</td>
        
        <td><a href="/clientworkMore/{{ $menu->id }}" class="btn btn-success">確認</a></td>
        <td><a href="/clientwork_edit/{{ $menu->id }}" class="btn btn-info">編集</a></td>
        <td><a href="/clientwork_delete/{{ $menu->id }}" class="btn btn-danger">削除</a></td>
        
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif

@stop