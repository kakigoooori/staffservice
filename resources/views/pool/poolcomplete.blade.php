@extends('layout/layout')
 @section('content')
<h1>内容確認</h1>
<form method="post" action="/done" id="create_form" enctype="multipart/form-data">

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
    <td>担当者</td>
    <td>
    {{ $input['nickname'] }}
    <input type="hidden" name="nickname" value="{{ $input['nickname'] }}">
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
<<<<<<< HEAD
    <td>氏名(カナ)</td>
=======
    <td>氏名(シメイ)</td>
>>>>>>> origin/master
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
    {{ $input['job'] }}
    <input type="hidden" name="job" value="{{ $input['job'] }}">
    </td>
  </tr>

  <tr>
    <td>面接区分</td>
    <td>
    {{ $input['judge'] }}
    <input type="hidden" name="judge" value="{{ $input['judge'] }}">
    </td>
  </tr>

  <tr>
    <td>面接日</td>
    <td>
    {{ $input['interviewday'] }}
    <input type="hidden" name="interviewday" value="{{ $input['interviewday'] }}">
    </td>
  </tr>

  <tr>
    <td>面接時間</td>
    <td>
    {{ $input['start_time'] }}～{{ $input['end_time'] }}
    <input type="hidden" name="start_time" value="{{ $input['start_time'] }}">
    <input type="hidden" name="end_time" value="{{ $input['end_time'] }}">
    </td>
  </tr>

  <tr>
    <td>面接場所</td>
    <td>
    {{ $input['place'] }}
    <input type="hidden" name="place" value="{{ $input['place'] }}">
    </td>
  </tr>
 
  <tr>
    <td>備考</td>
    <td>
    {!! nl2br(e( $input['note'] ))!!}
    <input type="hidden" name="note" value="{{ $input['note'] }}">
    </td>
  </tr>
  
 


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