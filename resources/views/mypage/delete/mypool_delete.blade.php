@extends('layout/layout')
 @section('content')

<h1>削除フォーム</h1>
<form method="post" action="/mypool_delete/done/{{ $data->id }}" id="delete_form">

{{ csrf_field() }}

<table class="table table-striped">
  <tr>
    <td>作業名</td>
    <td>
    {{ $data->work }}
    </td>
  </tr>

  <tr>
    <td>値段</td>
    <td>
    {{ $data->price }}
    </td>
  </tr>

  <tr>
    <td>ジャンル</td>
    <td>
    {{ $data->genre }}
    </td>
  </tr>

  <tr>
   <td>開始日</td>
   <td>
   {{ $data->start }}
   </td>
 </tr>

 <tr>
    <td>完了納期</td>
    <td>
    {{ $data->end}}
    </td>
  </tr>

  <tr>
    <td>詳細</td>
    <td>
    {!! nl2br(e( $data['worknote'] ))!!}
    </td>
  </tr>


</table>
<p class="text-danger">※ 一度削除すると元には戻せません</p>
<br>
</form>

<div class="row">
<div class="col-sm-12">
<br>
<input type="submit" form="delete_form" value="削除" class="btn btn-danger"><br><br>
<button class="btn btn-primary" onclick="history.back()">フォームに戻る</button>
</div>
</div>

@stop