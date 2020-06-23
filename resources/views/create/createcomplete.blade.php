@extends('layout/layout')
 @section('content')
<h1>内容確認</h1>
<form method="post" action="/create/done" id="user_create_form" enctype="multipart/form-data">

{{ csrf_field() }}

<table class="table table-striped">
  <tr>
    <td>ユーザーID</td>
    <td>
    {{ $input['name'] }}
    <input type="hidden" name="name" value="{{ $input['name'] }}">
    </td>
  </tr>

  <tr>
    <td>パスワード</td>
    <td>
    {{ $input['password'] }}
    <input type="hidden" name="password" value="{{ $input['password'] }}">
    </td>
  </tr>

  <tr>



</table>
<p>以上の内容で投稿します。</p>
<br>
</form>

<div class="row">
  <div class="col-sm-12">
    <a href="/create" class="btn btn-primary" value="">
      フォームに戻る
    </a>
<br>
<input type="submit" form="user_create_form" value="登録" class="btn btn-primary">
</div>
</div>
@stop