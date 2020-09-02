@extends('layout/layout')
@section('content')
<form method="post" action="/clientworkDeletedone/{{ $data->id }}" id="delete_form">
  <h2>案件削除</h2>
  {{ csrf_field() }}
  <table class="table">
    <tr>
      <th scope="row">案件名</th>
      <td>
        {{ $data->name }}
      </td>
    </tr>
    
  </table>
  <p>この案件を削除します。</p>
  <br >
</form>
<input type="submit" form="delete_form" value="削除" class="btn btn-danger">
<button class="btn btn-secondary" onclick="history.back()">戻る</button>
@stop