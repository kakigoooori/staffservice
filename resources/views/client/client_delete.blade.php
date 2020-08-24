@extends('layout/layout')
@section('content')
<form method="post" action="/clientDeletedone/{{ $data->id }}" id="delete_form">
  <h2>ユーザ削除</h2>
  {{ csrf_field() }}
  <table class="table">
    <tr>
      <th scope="row">名前</th>
      <td>
        {{ $data->name }}
      </td>
    </tr>
    
  </table>
  <p>このユーザを削除します。</p>
  <br >
</form>
<input type="submit" form="delete_form" value="削除" class="btn btn-danger">
<button class="btn btn-secondary" onclick="history.back()">戻る</button>
@stop