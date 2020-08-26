@extends('layout/layout')
@section('content')    

<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
   
<form method="post" action="mainpool" enctype="multipart/form-data">
<br>
<h2>スタッフ本登録</h2>

@if (session('success'))
<div class="alert alert-danger">
    {{ session('success') }}
</div>
@endif

<div class="container">
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

<h4 style="text-align:center;"><b>基本情報を記入し更新を押してください。</b></h4>

<p><b>登録日</b></p>
<div class="form-group">   
<input type="date" name="entryday" value="<?php echo date('Y-m-d');?>">
</div>

<p><b>氏名</b></p>
<div class="form-group">                        
  <input type="text" name="name" >
      <p>
        <span class="help-block text-danger">{{$errors->first('name')}}</span>
     </p>        
</div>


<p><b>氏名(カナ)</b></p>
<div class="form-group">                        
  <input type="text" name="phonetic" placeholder="氏名の間に半角スペース" >
      <p>
        <span class="help-block text-danger">{{$errors->first('phonetic')}}</span>
     </p>        
</div>

<p><b>性別</b></p>
<div class="form-group">                               
<select name="gender" >
<option value="">選択してください</option>
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
<input type="text" name="year" size="2" value="">年
<input type="text" name="month" size="1" maxlength="2" value="">月
<input type="text" name="day" size="1" maxlength="2" value="">日
<input type="hidden" name="age" value="" size="1">
</div> 



<p><b>住所</b></p>
<!-- ▼郵便番号入力フィールド(7桁) -->
<div class="form-group"> 
<input type="text" name="zip01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" value="">郵便番号(７桁) 
</div> 
<!-- ▼住所入力フィールド(都道府県) -->
<div class="form-group">  
<input type="text" name="pref01" size="20" value="">都道府県
</div> 
<!-- ▼住所入力フィールド(都道府県以降の住所) -->
<div class="form-group">  
<input type="text" name="addr01" size="40" value="">
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
<input id="tel" type="tel"  name="tel" value="{{ old('tel') }}" >

@if ($errors->has('tel'))
<span class="help-block">
<strong>{{ $errors->first('tel') }}</strong>
 </span>
@endif
</div>

<p><b>携帯電話</b></p>
<div class="form-group{{ $errors->has('mobiletel') ? ' has-error' : '' }}">
<input id="mobiletel" type="tel"  name="mobiletel" value="{{ old('mobiletel') }}" >

@if ($errors->has('mobiletel'))
<span class="help-block">
<strong>{{ $errors->first('mobiletel') }}</strong>
 </span>
@endif
</div>

<p><b>PCメールアドレス</b></p>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<input id="email" type="email" size="30"  name="email" value="{{ old('email') }}" >

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
 </span>
@endif
</div>

<p><b>携帯メールアドレス</b></p>
<div class="form-group{{ $errors->has('mobilemail') ? ' has-error' : '' }}">
<input id="mobilemail" type="email" size="30" name="mobilemail" value="{{ old('mobilemail') }}" >

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




<input type="submit" value="更新" class="btn btn-primary" style="width:100px;height:50px">    
</form>
</div>

</div>
@stop
