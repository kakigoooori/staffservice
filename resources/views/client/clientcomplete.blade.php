@extends('layout/layout')
 @section('content')
 
<h1>内容確認</h1>
<form method="post" action="/client/clientcomplete" id="create_form" enctype="multipart/form-data">

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
    <td>フリガナ</td>
    <td>
    {{ $input['name_kana'] }}
    <input type="hidden" name="name_kana" value="{{ $input['name_kana'] }}">
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
    <td>事業所名</td>
    <td>
    {{ $input['office_name'] }}
    <input type="hidden" name="office_name" value="{{ $input['office_name'] }}">
    </td>
  </tr>

  <tr>
    <td>所在地</td>
    <td>
    {{ $input['add01'] }}
    <input type="hidden" name="add01" value="{{ $input['add01'] }}">
    </td>
  </tr>

  <tr>
    <td>都道府県</td>
    <td>
    {{ $input['add02'] }}
    <input type="hidden" name="add02" value="{{ $input['add02'] }}">
    </td>
  </tr>

  <tr>
    <td>以降住所</td>
    <td>
    {{ $input['add03'] }}
    <input type="hidden" name="add03" value="{{ $input['add03'] }}">
    </td>
  </tr>


  <tr>
    <td>電話番号</td>
    <td>
    {{ $input['tel'] }}
    <input type="hidden" name="tel" value="{{ $input['tel'] }}">
    </td>
  </tr>


  <tr>
    <td>url</td>
    <td>
    {{ $input['url'] }}
    <input type="hidden" name="url" value="{{ $input['url'] }}">
    </td>
  </tr>

  <tr>
    <td>契約締結日</td>
    <td>
    {{ $input['date'] }}
    <input type="hidden" name="date" value="{{ $input['date'] }}">
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
<br><br>

<input type="submit" form="create_form" value="登録" class="btn btn-primary">
</div>
</div>


@stop