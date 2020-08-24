@extends('layout/layout')
@section('content')    

<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
   
<form method="post" action="done/{id}" enctype="multipart/form-data">
<br>
<h2>スタッフ本登録(仮登録で未入力の項目に記入をしてください)</h2>

@if (session('success'))
<div class="alert alert-danger">
    {{ session('success') }}
</div>
@endif

<div class="container">
<div class="row">
<div class="col-sm-5">
  <div class="card">
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

<h4 style="text-align:center;"><b>『基本情報』</b></h4>

<p><b>登録日</b></p>
<div class="form-group">   
<input type="date" name="entryday" value="<?php echo date('Y-m-d');?>">
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
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="consort" value="配偶者あり">配偶者あり
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="parent" value="有">子供有
</div>

<p><b>生年月日</b></p>
<div class="form-group">                       
<input type="text" name="year" size="2" value="{{ $input['year'] }}">年
<input type="text" name="month" size="1" maxlength="2" value="{{ $input['month'] }}">月
<input type="text" name="day" size="1" maxlength="2" value="{{ $input['day'] }}">日
<input type="hidden" name="age" value="{{ \Carbon\Carbon::createFromDate($input['year'],$input['month'],$input['day'])->age }}">{{ \Carbon\Carbon::createFromDate($input['year'],$input['month'],$input['day'])->age }}歳
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
<input type="text" name="addr01" size="40" value="{{ $input['addr01'] }}">
</div>

<p><b>最寄り駅</b></p>
<div class="form-group">
<div class="form-group">                               
<input id="line" type="text" size="10" placeholder="JR山手線" name="line" value="{{ old('line') }}">沿線名
</div>    
<input id="station" type="text" placeholder="新宿"  name="station" value="{{ old('station') }}">駅

@if ($errors->has('station'))
<span class="help-block">
<strong>{{ $errors->first('station') }}</strong>
 </span>
@endif
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
<input id="mobiletel" type="tel"  name="mobiletel" value="{{ $input['mobiletel'] }}" >

@if ($errors->has('mobiletel'))
<span class="help-block">
<strong>{{ $errors->first('mobiletel') }}</strong>
 </span>
@endif
</div>

<p><b>PCメールアドレス</b></p>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<input id="email" type="email" size="30"  name="email" value="{{ $input['email'] }}" >

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
 </span>
@endif
</div>

<p><b>携帯メールアドレス</b></p>
<div class="form-group{{ $errors->has('mobilemail') ? ' has-error' : '' }}">
<input id="mobilemail" type="email" size="30" name="mobilemail" value="{{ $input['mobilemail'] }}" >

@if ($errors->has('mobilemail'))
<span class="help-block">
<strong>{{ $errors->first('mobilemail') }}</strong>
 </span>
@endif
</div>

<p><b>緊急連絡先</b></p>
<div class="form-group{{ $errors->has('emergencytel') ? ' has-error' : '' }}">
<input id="emergencytel" type="tel"  name="emergencytel" value="{{ old('emergencytel') }}">

@if ($errors->has('emergencytel'))
<span class="help-block">
<strong>{{ $errors->first('emergencytel') }}</strong>
 </span>
@endif
</div>


<p><b>入社日</b></p>
<div class="form-group">   
<input type="date" name="joincompany" value="<?php echo date('Y-m-d');?>">
</div>


<br/>
<br>
</div>
</div>


<div class="col-sm-7">
<div class="card">
  
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="">業務・資格</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/salary/{{$input['id']}}>給与・保険</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/famiry/{{$input['id']}}>家族</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/hope/{{$input['id']}}>希望</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/agreement/{{$input['id']}}>契約</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/memo/{{$input['id']}}>メモ</a>
  </li>
</ul>

<p><b>担当者</b></p>
<div class="form-group">   
<input type="text" name="nickname" value="{{ $input['nickname'] }}">
</div>

<div class="row">

<div class="col-sm-8">
<div class="card">

<p><b>業務実績 &nbsp;(直近の５件)</b></p>
<div class="form-group">   
<input type="text" name="performance1" value="{{ old('performance1') }}" size="30" placeholder="例：医療サービスの法人営業">
</div>
<div class="form-group">   
<input type="text" name="performance2" value="{{ old('performance2') }}" size="30">
</div>
<div class="form-group">   
<input type="text" name="performance3" value="{{ old('performance3') }}" size="30">
</div>
<div class="form-group">   
<input type="text" name="performance4" value="{{ old('performance4') }}" size="30">
</div>
<div class="form-group">   
<input type="text" name="performance5" value="{{ old('performance5') }}" size="30">
</div>


</div>
</div>



<div class="col-sm4">
<div class="card">

<p><b>評価</b></p>

<div class="form-group">                               
<b>&nbsp;&nbsp;ランク:</b><select name="rank">
<option value="" selected>未選択</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
</select>    
</div>
<div class="form-group">   
<b>&nbsp;&nbsp;&nbsp;&nbsp;総合評価:</b><input type="text" name="score" value="{{ old('score') }}" size="2">&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div class="form-group">   
<b>&nbsp;&nbsp;&nbsp;PCスキル:</b><input type="text" name="pc" value="{{ old('pc') }}" size="2">
</div>
<div class="form-group">   
<b>基本マナー:</b><input type="text" name="manners" value="{{ old('manners') }}" size="2">
</div>
<div class="form-group">   
<b>&nbsp;&nbsp;&nbsp;&nbsp;一般常識:</b><input type="text" name="sensible" value="{{ old('sensible') }}" size="2">
</div>

</div>
</div>

</div>

<p></p>


<div class="card">

<table>
<tr>
        <th><p><b>資格</b></p></th>
        <th><p><b>習得年月</b></p></th>
</tr>
<tr>
<th>
<div class="form-group">   
<input type="text" name="certification1" value="{{ old('certification1') }}" size="35">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="learn" value="{{ old('learn1') }}">
</div>
</th>
</tr>
<tr>
<th>
<div class="form-group">   
<input type="text" name="certification2" value="{{ old('certification2') }}"size="35">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="learn" value="{{ old('learn2') }}">
</div>
</th>
</tr>
<tr>
<th>
<div class="form-group">   
<input type="text" name="certification3" value="{{ old('certification3') }}" size="35">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="learn" value="{{ old('learn3') }}">
</div>
</th>
</tr>
<tr>
<th>
<div class="form-group">   
<input type="text" name="certification4" value="{{ old('certification4') }}" size="35">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="learn4" value="{{ old('learn5') }}">
</div>
</th>
</tr>
<tr>
<th>
<div class="form-group">   
<input type="text" name="certification5" value="{{ old('certification5') }}" size="35">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="learn5" value="{{ old('learn5') }}">
</div>
</th>
</tr>

</table>
<p><b>特技</b></p>
<div class="form-group">   
<input type="text" name="skill1" value="{{ old('skill1') }}" size="35">
</div>
<div class="form-group">   
<input type="text" name="skill2" value="{{ old('skill2') }}" size="35">
</div>
<div class="form-group">   
<input type="text" name="skill3" value="{{ old('skill3') }}" size="35">
</div>

</div>

<div class="card">
<p><b>備考</b></p>
<div class="form-group" >
<textarea name="note" rows="6" cols="60" 
      @if(!empty($errors->first('note'))) border-danger @endif
      value="" placeholder="例：子供ころから野球チームにいたので集団行動が得意です">{{ old('note') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('note')}}</span>
     </p>   
</div>
</div>

</div>
<input type="submit" value="更新" class="btn btn-primary" style="width:100px;height:50px">    
</form>
</div>
</div>
</div>
@stop
