@extends('layout/layout')
 @section('content')
<h1>内容確認</h1>
<form method="post" action="/maindone" id="create_form" enctype="multipart/form-data">

{{ csrf_field() }}

<table class="table table-striped">
  <tr>
    <td>登録日</td>
    <td>
    {{ $input['entryday'] }}
    <input type="hidden" name="entryday" value="{{ $input['entryday'] }}">
    </td>
  </tr>

  <tr>
    <td>氏名(漢字)</td>
    <td>
    {{ $input['name'] }}
    <input type="hidden" name="name" value="{{ $input['name'] }}">
    </td>
  </tr>

  <tr>
    <td>氏名(カナ)</td>
    <td>
    {{ $input['phonetic'] }}
    <input type="hidden" name="phonetic" value="{{ $input['phonetic'] }}">
    </td>
  </tr>

  <tr>
    <td>性別</td>
    <td>
    {{ $input['gender'] }}
    <input type="hidden" name="gender" value="{{ $input['gender'] }}">
    </td>
  </tr>

  <tr>
    <td>生年月日</td>
    <td>
    {{ $input['year'] }}年{{ $input['month'] }}月{{ $input['day'] }}日
    <input type="hidden" name="year" value="{{ $input['year'] }}">
    <input type="hidden" name="month" value="{{ $input['month'] }}">
    <input type="hidden" name="day" value="{{ $input['day'] }}">
    <input type="hidden" name="age" value="{{ \Carbon\Carbon::createFromDate($input['year'],$input['month'],$input['day'])->age }}" size="1">
    &nbsp;{{ \Carbon\Carbon::createFromDate($input['year'],$input['month'],$input['day'])->age }}歳
    </td>
  </tr>

  <tr>
    <td>郵便番号</td>
    <td>
    {{ $input['zip01'] }}
    <input type="hidden" name="zip01" value="{{ $input['zip01'] }}">
    </td>
  </tr>

  <tr>
    <td>都道府県</td>
    <td>
    {{ $input['pref01'] }}
    <input type="hidden" name="pref01" value="{{ $input['pref01'] }}">
    </td>
  </tr>

  <tr>
    <td>以降の住所</td>
    <td>
    {{ $input['addr01'] }}
    <input type="hidden" name="addr01" value="{{ $input['addr01'] }}">
    </td>
  </tr>

  <tr>
    <td>沿線名</td>
    <td>
    {{ $input['line'] }}
    <input type="hidden" name="line" value="{{ $input['line'] }}">
    </td>
  </tr>

  <tr>
    <td>駅名</td>
    <td>
    {{ $input['station'] }}
    <input type="hidden" name="station" value="{{ $input['station'] }}">
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
    <td>携帯電話</td>
    <td>
    {{ $input['mobiletel'] }}
    <input type="hidden" name="mobiletel" value="{{ $input['mobiletel'] }}">
    </td>
  </tr>

  <tr>
    <td>PCメールアドレス</td>
    <td>
    {{ $input['email'] }}
    <input type="hidden" name="email" value="{{ $input['email'] }}">
    </td>
  </tr>

  <tr>
    <td>携帯メールアドレス</td>
    <td>
    {{ $input['mobilemail'] }}
    <input type="hidden" name="mobilemail" value="{{ $input['mobilemail'] }}">
    </td>
  </tr>

  <tr>
    <td>募集媒体</td>
    <td>
    {{ $input['emergencytel'] }}
    <input type="hidden" name="emergencytel" value="{{ $input['emergencytel'] }}">
    </td>
  </tr>

  <tr>
    <td>入社日</td>
    <td>
    {{ $input['joincompany'] }}
    <input type="hidden" name="joincompany" value="{{ $input['joincompany'] }}">
    </td>
  </tr>

  <tr>
    <td>担当者</td>
    <td>
    {{ Auth::user()->name }}
    <input type="hidden" name="nickname" value="{{ Auth::user()->name }}">
    </td>
  </tr>


</table>
<p>上記の内容で基本情報を登録します。</p>
<br>
</form>

<div class="row">
  <div class="col-sm-12">
    <a href="/mainpool" class="btn btn-primary" value="">
      フォームに戻る
    </a>
<br>
<input type="submit" form="create_form" value="登録" class="btn btn-primary">
</div>
</div>
@stop