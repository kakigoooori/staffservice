@extends('layout/layout')
 @section('content')
<h1>内容確認</h1>
<form method="post" action="/client/done" id="create_form" enctype="multipart/form-data">

{{ csrf_field() }}

<table class="table table-striped">
  <tr>
    <td>クライアント名</td>
    <td>
    {{ $input['name'] }}
    <input type="hidden" name="name" value="{{ $input['name'] }}">
    </td>
  </tr>

  <tr>
    <td></td>
    <td>
    {{ $input['name_kana'] }}
    <input type="hidden" name="area" value="{{ $input['name_kana'] }}">
    </td>
  </tr>

  <tr>
    <td>メールアドレス</td>
    <td>
    {{ $input['email'] }}
    <input type="hidden" name="email" value="{{ $input['email'] }}">
    </td>
  </tr>

  <tr>
    <td></td>
    <td>
    {{ $input['office_name'] }}
    <input type="hidden" name="area" value="{{ $input['office_name'] }}">
    </td>
  </tr>

  <tr>
    <td></td>
    <td>
    {{ $input['address'] }}
    <input type="hidden" name="area" value="{{ $input['address'] }}">
    </td>
  </tr>

  <tr>
    <td></td>
    <td>
    {{ $input['tel'] }}
    <input type="hidden" name="area" value="{{ $input['tel'] }}">
    </td>
  </tr>

  <tr>
    <td></td>
    <td>
    {{ $input['date'] }}
    <input type="hidden" name="area" value="{{ $input['url'] }}">
    </td>
  </tr>

  <tr>
    <td></td>
    <td>
    {{ $input['date'] }}
    <input type="hidden" name="area" value="{{ $input['date'] }}">
    </td>
  </tr>

  <tr>
    <td>職種</td>
    <td>
    {{ $input['genre'] }}
    <input type="hidden" name="genre" value="{{ $input['genre'] }}">
    </td>
  </tr>

  
 
  <tr>
    <td>備考欄</td>
    <td>
    {!! nl2br(e( $input['note'] ))!!}
    <input type="hidden" name="note" value="{{ $input['note'] }}">
    </td>
  </tr>



  
 


</table>
<p>以上の内容で登録します。</p>
<br>
</form>

<div class="row">
  <div class="col-sm-12">
    <a href="/client" class="btn btn-primary" value="">
      戻る
    </a>
<br>
<input type="submit" form="create_form" value="登録" class="btn btn-primary">
</div>
</div>
@stop