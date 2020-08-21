@extends('layout/layout')
@section('content')    

<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
   
<form method="post" action="/salary/done/{{$input['id'] }}" enctype="multipart/form-data">
<br>
<h2>スタッフ本登録(仮登録で未入力の項目に記入をしてください)</h2>
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
<input type="date" name="entryday" value="{{ $input['entryday'] }}">
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
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="consort" value="{{ $input['consort'] }}">配偶者あり
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="parent" value="{{ $input['parent'] }}">子供有
</div>

<p><b>生年月日</b></p>
<div class="form-group">                       
<input type="text" name="year" size="2" value="{{ $input['year'] }}">年
<input type="text" name="month" size="1" maxlength="2" value="{{ $input['month'] }}">月
<input type="text" name="day" size="1" maxlength="2" value="{{ $input['day'] }}">日
<input type="hidden" name="age" value="{{ \Carbon\Carbon::createFromDate($input['year'],$input['month'],$input['day'])->age }}">
{{ \Carbon\Carbon::createFromDate($input['year'],$input['month'],$input['day'])->age }}歳
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
<input id="station" type="text" size="10" placeholder="JR山手線" name="line" value="{{ $input['line'] }}" >沿線名
</div>    
<input id="station" type="text" placeholder="新宿"  name="station" value="{{ $input['station'] }}" >駅

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
<input id="emergencytel" type="tel"  name="emergencytel" value="{{ $input['emergencytel'] }}">

@if ($errors->has('emergencytel'))
<span class="help-block">
<strong>{{ $errors->first('emergencytel') }}</strong>
 </span>
@endif
</div>


<p><b>入社日</b></p>
<div class="form-group">   
<input type="date" name="joincompany" value="{{ $input['joincompany'] }}">
</div>


<br/>
<br>
</div>
</div>


<div class="col-sm-7">
<div class="card">
  
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href=/genuine/{{$input['id']}}>業務・資格</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="">給与・保険</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/family/{{$input['id']}}>家族</a>
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


<p><b>基本給</b></p>
<div class="form-group">   
<input type="text" name="basic" value="">
</div>
<p><b>手当</b></p>
<div class="form-group">   
<input type="text" name="allowance" value="">
</div>




<p><b>保険者番号 </b></p>
<div class="form-group">   
<input type="text" name="insurance" value="{{ old('performance1') }}" size="30" >
</div>
<p><b>マイナンバー </b></p>
<div class="form-group">   
<input type="text" name="mynumber" value="{{ old('performance1') }}" size="30" >
</div>







<p></p>


<div class="card">
<p><b>給与振込先</b></p>
<table>
<tr>
        <th><p><b>金融機関名</b></p></th>
        <th><p><b>店名</b></p></th>
        <th><p><b>口座番号</b></p></th>
        <th><p><b>口座名義(フリガナ)</b></p></th>
</tr>
<tr>
<th>
<div class="form-group">   
<input type="text" name="bankname" value="{{ old('certification1') }}" size="10">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="storename" value="{{ old('learn1') }}"size="10">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="account_number" value="{{ old('learn1') }}"size="10">
</div>
</th>
<th>
<div class="form-group">   
<input type="text" name="account_name" value="{{ old('learn1') }}">
</div>
</th>
</tr>


</table>


</div>

<div class="card">
<p><b>備考</b></p>
<div class="form-group" >
<textarea name="note" rows="6" cols="60" 
      @if(!empty($errors->first('note'))) border-danger @endif
      value="" placeholder="例：令和２年１月給与から、リーダ手当で10000円">{{ old('note') }}
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
