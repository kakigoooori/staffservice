@extends('layout/layout')
 @section('content')
<h1>内容確認</h1>
<form method="post" action="/done" id="create_form" enctype="multipart/form-data">

{{ csrf_field() }}

<table class="table table-striped">
  <tr>
    <td>依頼名</td>
    <td>
    {{ $input['work'] }}
    <input type="hidden" name="work" value="{{ $input['work'] }}">
    </td>
  </tr>

  <tr>
    <td>単価</td>
    <td>
    {{ $input['price'] }}
    <input type="hidden" name="price" value="{{ $input['price'] }}">
    </td>
  </tr>

  <tr>
    <td>ジャンル</td>
    <td>
    {{ $input['genre'] }}
    <input type="hidden" name="genre" value="{{ $input['genre'] }}">
    </td>
  </tr>

  <tr>
    <td>施工開始</td>
    <td>
    {{ $input['start'] }}
    <input type="hidden" name="start" value="{{ $input['start'] }}">
    </td>
  </tr>

  <tr>
    <td>施工完了</td>
    <td>
    {{ $input['end'] }}
    <input type="hidden" name="end" value="{{ $input['end'] }}">
    </td>
  </tr>

 
  <tr>
    <td>施工内容</td>
    <td>
    {!! nl2br(e( $input['worknote'] ))!!}
    <input type="hidden" name="worknote" value="{{ $input['worknote'] }}">
    </td>
  </tr>



  <input type="hidden" name="user_id" value="{{ $input['user_id'] }}">
  
 


</table>
<p>以上の内容で投稿します。</p>
<br>
</form>

<div class="row">
  <div class="col-sm-12">
    <a href="/pool" class="btn btn-primary" value="">
      フォームに戻る
    </a>
<br>
<input type="submit" form="create_form" value="登録" class="btn btn-primary">
</div>
</div>
@stop