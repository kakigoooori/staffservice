@extends('layout/layout')
@section('content')    
   
<h1>検索</h1>
 
<form action="{{url('/search')}}" method="GET">
    作業名
    <p><input type="text" name="work" value="{{$work}}"></p>
    値段
    <p><input type="text" name="price" value="{{$price}}">以上</p>

    
    <input type="checkbox" name="genre1" value="建築">建築　 
    
    <input type="checkbox" name="genre2" value="土木">土木　
   
    <input type="checkbox" name="genre3" value="電気工事">電気工事　    
   
    <input type="checkbox" name="genre4" value="管工事">管工事　    
    
    <input type="checkbox" name="genre5" value="造園施工">造園施工　    
  
    <input type="checkbox" name="genre6" value="建設機械">建設機械　    
    
    <input type="checkbox" name="genre7" value="電気通信">電気通信　    
   
    <p><input type="submit" value="検索"  class="btn btn-primary"></p>
</form>

@if ($search->count())
 
<table class="table table-hover">
    <tr>
        <th>id</th>
        <th>作業名</th>
        <th>値段</th>
        <th>ジャンル</th>
        <th>開始日</th>
        <th>完了納期</th>
        <th>詳細</th>
    </tr>
    @foreach ($search as $menu)
    <tr>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->work }}</td>
        <td>{{ $menu->price }}</td>
        <td>{{ $menu->genre }}</td>
        <td>{{ $menu->start }}</td>
        <td>{{ $menu->end }}</td>
        <td><a href="/product/{{ $menu->id }}" class="btn btn-success">確認する</a></td>
        <th></th>
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif

@stop