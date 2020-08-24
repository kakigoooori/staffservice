@extends('layout/layout')
 @section('content')
 
<h1>内容確認</h1>
<form method="post" action="/clientWorks/clientWorks_complete" id="create_form" enctype="multipart/form-data">

{{ csrf_field() }}
<input type="hidden" name="client_id" value="{{$input['client_id']}}">

<table class="table table-striped">
  <tr>
    <td>案件名</td>
    <td>
    {{ $input['name'] }}{{$input['client_id']}}
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
    <td>開発開始</td>
    <td>
    {{ $input['start'] }}
    <input type="hidden" name="start" value="{{ $input['start'] }}">
    </td>
  </tr>

  <tr?>
    <td>開発終了</td>
    <td>
    {{ $input['end'] }}
    <input type="hidden" name="end" value="{{ $input['end'] }}">
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
    {!! nl2br(e( $input['jobcontent'] ))!!}
    <input type="hidden" name="jobcontent" value="{{ $input['jobcontent'] }}">
    </td>
  </tr>

  <tr>
    <td>必須スキル</td>
    <td>
    {!! nl2br(e( $input['required_skill'] ))!!}
    <input type="hidden" name="required_skill" value="{{ $input['required_skill'] }}">
    </td>
  </tr>

  <tr>
    <td>歓迎スキル</td>
    <td>
    {!! nl2br(e( $input['Welcome_skills'] ))!!}
    <input type="hidden" name="Welcome_skills" value="{{ $input['Welcome_skills'] }}">
    </td>
  </tr>


<tr>
    <td>勤務地情報・備考</td>
    <td>
    {!! nl2br(e( $input['note'] ))!!}
    <input type="hidden" name="note" value="{{ $input['note'] }}">
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