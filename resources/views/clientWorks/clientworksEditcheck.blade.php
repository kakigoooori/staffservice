@extends('layout/layout')
 @section('content')
<h1>変更内容確認</h1>
<form method="post" action="/clientworksEdit/done/{{ $input['id'] }}" id="create_form">

{{ csrf_field() }}

<tr>
    <td>掲載開始</td>
    <td>
    {{ $input['start'] }}
    <input type="hidden" name="start" value="{{ $input['start'] }}">
    </td>
  </tr>

  <tr>
    <td>掲載終了</td>
    <td>
    {{ $input['end'] }}
    <input type="hidden" name="end" value="{{ $input['end'] }}">
    </td>
  </tr>

<table class="table table-striped">
  <tr>
    <td>案件名</td>
    <td>
    {{ $input['name'] }}
    <input type="hidden" name="name" value="{{ $input['name'] }}">
    </td>
  </tr>

  <tr>
    <td>月額報酬</td>
    <td>
    {{ $input['price'] }}
    <input type="hidden" name="price" value="{{ $input['price'] }}">
    </td>
  </tr>

  <tr>
    <td>開発期間</td>
    <td>
    {{ $input['devstart'] }}
    <input type="hidden" name="devstart" value="{{ $input['devstart'] }}">
    </td>
  </tr>

  <tr>
    <td>開発終了</td>
    <td>
    {{ $input['devend'] }}
    <input type="hidden" name="devend" value="{{ $input['devend'] }}">
    </td>
  </tr>

  <tr>
    <td>業界</td>
    <td>
    {{ $input['genre'] }}
    <input type="hidden" name="genre" value="{{ $input['genre'] }}">
    </td>
  </tr>

  <tr>
    <td>郵便番号</td>
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
    <td>以降の住所</td>
    <td>
    {{ $input['add03'] }}
    <input type="hidden" name="add03" value="{{ $input['add03'] }}">
    </td>
  </tr>


  <tr>
    <td>最寄り駅</td>
    <td>
    {{ $input['station'] }}
    <input type="hidden" name="station" value="{{ $input['station'] }}">
    </td>
  </tr>


  <tr>
    <td>リモート開発</td>
    <td>
    {{ $input['remote'] }}
    <input type="hidden" name="remote" value="{{ $input['remote'] }}">
    </td>
  </tr>

  <tr>
    <td>使用言語</td>
    <td>
    {{ $input['tool'] }}
    <input type="hidden" name="tool" value="{{ $input['tool'] }}">
    </td>
  </tr>

  <tr>
    <td>職務内容</td>
    <td>
    {{ $input['jobcontent'] }}
    <input type="hidden" name="jobcontent" value="{{ $input['jobcontent'] }}">
    </td>
  </tr>

  <tr>
    <td>必須スキル</td>
    <td>
    {{ $input['required_skill'] }}
    <input type="hidden" name="required_skill" value="{{ $input['required_skill'] }}">
    </td>
  </tr>

  
  <tr>
    <td>歓迎スキル</td>
    <td>
    {{ $input['Welcome_skills'] }}
    <input type="hidden" name="Welcome_skills" value="{{ $input['Welcome_skills'] }}">
    </td>
  </tr>

  <tr>
    <td>備考欄</td>
    <td>
    {!! nl2br(e( $input['note'] ))!!}
    <input type="hidden" name="note" value="{{ $input['note'] }}">
    </td>
  </tr>



  <input type="hidden" name="user_id" value="{{ $input['user_id'] }}">
  
 


</table>
<p>内容変更します。</p>
<br>
</form>
<br>
<input type="submit" form="create_form" value="変更" class="btn btn-primary">
<br>
<div class="row">
  <div class="col-sm-12">
  <button type="submit" name="action" class="btn btn-danger" value="back">フォームに戻る</button>

</div>
</div>
@stop