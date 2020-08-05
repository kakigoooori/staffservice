@extends('layout/layout')
@section('content')    

<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
   
<form method="post" action="/pool" enctype="multipart/form-data">
<br>
<h2>スタッフ本登録</h2>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif {{ csrf_field() }}
<br><br><br>

<p><b>登録日</b></p>
<div class="form-group">   
<input type="date" name="entryday" value="{{ $input['entryday'] }}">
</div>

<p><b>担当者</b></p>
<div class="form-group">   
<input type="text" name="nickname" value="{{ $input['nickname'] }}">
</div> 

<p><b>氏名</b></p>
<div class="form-group">                        
  <input type="text" name="name" 
      @if(!empty($errors->first('name'))) border-danger @endif
      value="{{ $input['name'] }}">
      <p>
        <span class="help-block text-danger">{{$errors->first('name')}}</span>
     </p>        
</div>

<p><b>氏名(カナ)</b></p>
<div class="form-group">                        
  <input type="text" name="phonetic" placeholder="氏名の間に半角スペース" 
      @if(!empty($errors->first('phonetic '))) border-danger @endif
      value="{{ $input['phonetic'] }}">
      <p>
        <span class="help-block text-danger">{{$errors->first('phonetic')}}</span>
     </p>        
</div>

<p><b>性別</b></p>
<div class="form-group">                               
<select name="gender" >
<option value="{{ $input['gender'] }}">{{ $input['gender'] }}</option>
<option value="女">女</option>
<option value="男">男</option>
</select> 
                                    
@if ($errors->has('gender'))
<span class="help-block">
<strong>{{ $errors->first('gender') }}</strong>
</span>
 @endif

</div>

<p><b>生年月日</b></p>
<div class="form-group">                       
<input type="text" name="year" size="2" value="{{ $input['year'] }}">年
<input type="text" name="year" size="1" maxlength="2" value="{{ $input['month'] }}">月
<input type="text" name="year" size="1" maxlength="2" value="{{ $input['day'] }}">日  
</div> 

<p><b>住所</b></p>
<!-- ▼郵便番号入力フィールド(7桁) -->
<div class="form-group"> 
<input type="text" name="zip01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" value="{{ $input['zip01'] }}">郵便番号(７桁) 
</div> 
<!-- ▼住所入力フィールド(都道府県) -->
<div class="form-group">  
<input type="text" name="pref01" size="20" value="{{ $input['pref01'] }}">都道府県
</div> 
<!-- ▼住所入力フィールド(都道府県以降の住所) -->
<div class="form-group">  
<input type="text" name="addr01" size="60" value="{{ $input['addr01'] }}">以降の住所
</div> 

<p><b>電話番号</b></p>
<div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
<input id="tel" type="tel"  name="tel" value="{{ $input['tel'] }}" >

@if ($errors->has('tel'))
<span class="help-block">
<strong>{{ $errors->first('tel') }}</strong>
 </span>
@endif
</div>

<p><b>携帯電話</b></p>
<div class="form-group{{ $errors->has('mobiletel') ? ' has-error' : '' }}">
<input id="mobiletel" type="mobiletel"  name="mobiletel" value="{{ $input['mobiletel'] }}" >

@if ($errors->has('mobiletel'))
<span class="help-block">
<strong>{{ $errors->first('mobiletel') }}</strong>
 </span>
@endif
</div>

<p><b>PCメールアドレス</b></p>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<input id="email" type="mobiletel"  name="email" value="{{ $input['email'] }}" >

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
 </span>
@endif
</div>

<p><b>携帯メールアドレス</b></p>
<div class="form-group{{ $errors->has('mobilemail') ? ' has-error' : '' }}">
<input id="mobilemail" type="mobilemail"  name="mobilemail" value="{{ $input['mobilemail'] }}" >

@if ($errors->has('mobilemail'))
<span class="help-block">
<strong>{{ $errors->first('mobilemail') }}</strong>
 </span>
@endif
</div>


<p><b>募集媒体</b></p>
<div class="form-group">                               
<select name="job"  >
<option value="{{ $input['job'] }}" selected>{{ $input['job'] }}</option>
<option value="doda">doda</option>
<option value="リクルート">リクルート</option>
<option value="マイナビ">マイナビ</option>
<option value="ハローワーク">ハローワーク</option>
<option value="エン転職">エン転職</option>
<option value="その他">その他</option>
</select>
</div>    

<p><b>面接区分</b></p>
<div class="form-group">                               
<select name="judge" >
<option value="{{ $input['judge'] }}" selected>{{ $input['judge'] }}</option>
<option value="初回審査">初回審査</option>
<option value="不採用">不採用</option>
<option value="審査中">審査中</option>
<option value="その他">その他</option>
</select>    
</div>

<p><b>面接日</b></p>
<div class="form-group">   
<input type="date" name="interviewday" value="{{ $input['interviewday'] }}">
</div>

<p><b>面接時間　※10分刻みの入力</b></p>
<div class="form-group">           
<input type="time" name="start_time" step="600" value="{{ $input['start_time'] }}">～<input type="time"  name="end_time" step="600" value="{{ $input['end_time'] }}">
</div>

<p><b>面接場所</b></p>
<div class="form-group">                               
<select name="place" >
<option value="{{ $input['place'] }}" selected>{{ $input['place'] }}</option>
<option value="新宿 本社">新宿 本社</option>
<option value="渋谷">渋谷</option>
<option value="池袋">池袋</option>
<option value="大宮">大宮</option>
<option value="横浜">横浜</option>
</select>    
</div>

<p><b>備考</b></p>
<div class="form-group" >
<textarea name="note" rows="4" cols="60" 
      @if(!empty($errors->first('note'))) border-danger @endif
      value="" placeholder="例：空き缶拾い">{{ old('note') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('note')}}</span>
     </p>   
</div>

<br/><br/>        
<input type="submit" value="投稿" class="btn btn-primary">    
</form>
<br>
@stop
