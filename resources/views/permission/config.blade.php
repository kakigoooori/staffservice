@extends('layout/layout')

@section('content')
<h2>権限一覧</h2><br>
<table class="teble table-bordered">
    <thead>
        <tr>
        <th class="text-center" style="width:20%"></th>
        <th class="text-center" style="width:10%">マスタ</th>
        <th class="text-center" style="width:10%">スタッフ管理</th>
        <th class="text-center" style="width:10%">クライアント管理</th>
        <th class="text-center" style="width:10%">案件管理</th>
        <th class="text-center" style="width:10%">受注管理</th>
        <th style="width:10%"></th>
        </tr>
    </thead>
    @foreach($roles as $role)
    <tbody>
        <tr>
        <th>{{ $role['name'] }}</th>
        @foreach($permissions as $permission)
            @if(!empty($permission[$role['name']]))
            <td class="text-center">〇</td>
            @else
            <td class="text-center">✕</td>
            @endif
        @endforeach
        <td class="text-center"><a class="btn btn-primary" role="button" href="/mypage/authority/edit/{{ $role['id'] }}">権限を変更</a></td>
        </tr>
    </tbody>
    @endforeach
</table>
@stop