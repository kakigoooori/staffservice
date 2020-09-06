@extends('layout/layout')

@section('content')
<h2>権限変更</h2><br>
<p><b>変更する役職：{{ $role['name'] }}</b></p>
<form method="post" action="/mypage/authority/edit/done">
{{ csrf_field() }}
    <table class="table">
        <tr>
        <th>マスタ</th>
        <td>
            <select name="master">
            <option value="allow" @if(!empty($permissions['master'])) selected @endif>許可する</option>
            <option value="notallow" @if(empty($permissions['master'])) selected @endif>許可しない</option>
            </select>
        </td>
        </tr>
        <tr>
        <th>スタッフ管理</th>
        <td>
            <select name="staff_management">
            <option value="allow" @if(!empty($permissions['staff_management'])) selected @endif>許可する</option>
            <option value="notallow" @if(empty($permissions['staff_management'])) selected @endif>許可しない</option>
            </select>
        </td>
        </tr>
        <tr>
        <th>クライアント管理</th>
        <td>
            <select name="client_management">
            <option value="allow" @if(!empty($permissions['client_management'])) selected @endif>許可する</option>
            <option value="notallow" @if(empty($permissions['client_management'])) selected @endif>許可しない</option>
            </select>
        </td>
        </tr>
        <tr>
        <th>案件管理</th>
        <td>
            <select name="matter_management">
            <option value="allow" @if(!empty($permissions['matter_management'])) selected @endif>許可する</option>
            <option value="notallow" @if(empty($permissions['matter_management'])) selected @endif>許可しない</option>
            </select>
        </td>
        </tr>
        <tr>
        <th>受注管理</th>
        <td>
            <select name="order_management">
            <option value="allow" @if(!empty($permissions['order_management'])) selected @endif>許可する</option>
            <option value="notallow" @if(empty($permissions['order_management'])) selected @endif>許可しない</option>
            </select>
        </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="{{ $role['id'] }}">
    <input type="submit" value="変更" class="btn btn-primary">
    <input type="button" value="戻る" onclick=history.back() class="btn btn-secondary">
</form>
@stop