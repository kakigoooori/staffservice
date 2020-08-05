@extends('layout/layout')
@section('content')    
   
<h1>仮登録一覧</h1>
 
<form action="{{url('/search')}}" method="GET">
<table class="table table-hover">

<tr>
    <th>担当者</th>
    <th>面接区分</th>
    <th>面接場所</th>
    <th>面接日</th>
</tr>

<tr>
    <th>
    <input type="text" name="nickname" value="{{$nickname}}">
    </th>
    <th>
    <select name="judge" >
    <option value="" selected>選択してください</option>
    <option value="初回審査">初回審査</option>
    <option value="不採用">不採用</option>
    <option value="審査中">審査中</option>
    <option value="その他">その他</option>
    </select>
    </th>
    <th>
    <select name="place" >
    <option value="" selected>選択してください</option>
    <option value="新宿 本社">新宿 本社</option>
    <option value="渋谷">渋谷</option>
    <option value="池袋">池袋</option>
    <option value="大宮">大宮</option>
    <option value="横浜">横浜</option>
    </select>    
    </th>
    <th>
    <input type="date" name="interviewday" value="<?php echo date('Y-m-d');?>">
    </th>
</tr>               

</table>
    <p><input type="submit" value="検索する"  class="btn btn-primary"></p>

</form>

@if ($search->count())
 
<table class="table table-hover">
    <tr>
        <th>番号</th>
        <th>氏名</th>
        <th>連絡先</th>
        <th>担当者</th>
        <th>面接区分</th>
        <th>面接日</th>
        <th>開始</th>
        <th>終了</th>
        <th>面接場所</th>
        <th>備考</th>
        <th>本登録</th>
        <th>本登録へ</th>
    </tr>
    @foreach ($search as $menu)
    <tr>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->mobiletel}}</td>
        <td>{{ $menu->nickname }}</td>
        <td>{{ $menu->judge}}</td>
        <td>{{ $menu->interviewday }}</td>
        <td>{{ $menu->start_time  }}</td>
        <td>{{ $menu->end_time }}</td>
        <td>{{ $menu->place  }}</td>
        <td>{{ $menu->note   }}</td>
        <td>〇or×</td>
        <td><a href="/product/{{ $menu->id }}" class="btn btn-success">本登録へ</a></td>
        <th></th>
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif

@stop