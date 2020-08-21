@extends('layout/layout')
@section('content')

   
<form method="post" action="/client_edit/{{ $input['id'] }}">
<br>
<h2>クライアント編集</h2>
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
<p><b>クライアント名</b></p>
<div class="form-group">                        
  <input type="text" name="name"  class="form-control 
  @if(!empty($errors->first('name')))
        border-danger
      @endif"
      @if(isset($input['name']))
        value="{{ $input['name'] }}"
      @else
      value="{{ old('name') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('name')}}</span>
     </p>        
</div>        

<p><b>フリガナ</b></p>     
<div class="form-group">                    
<input type="text" name="name_kana"  class="form-control
@if(!empty($errors->first('name_kana')))
        border-danger
      @endif"
      @if(isset($input['name_kana']))
        value="{{ $input['name_kana'] }}"
      @else
      value="{{ old('name_kana') }}"
      @endif>
      <p>
      <span class="help-block text-danger">
        {{$errors->first('name_kana')}}
      </span>
    </p>            
</div>       

<p><b>メールアドレス</b></p>     
<div class="form-group">                    
<input type="text" name="email"  class="form-control
@if(!empty($errors->first('email')))
        border-danger
      @endif"
      @if(isset($input['email']))
        value="{{ $input['email'] }}"
      @else
      value="{{ old('email') }}"
      @endif>
      <p>
      <span class="help-block text-danger">
        {{$errors->first('email')}}
      </span>
    </p>            
</div>       

<p><b>事業所名</b></p>
<div class="form-group">                        
  <input type="text" name="office_name"  class="form-control 
  @if(!empty($errors->first('office_name')))
        border-danger
      @endif"
      @if(isset($input['office_name']))
        value="{{ $input['office_name'] }}"
      @else
      value="{{ old('office_name') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('office_name')}}</span>
     </p>        
</div>        

<p><b>郵便番号</b></p>
<div class="form-group">                        
  <input type="text" name="add01"  class="form-control 
  @if(!empty($errors->first('add01')))
        border-danger
      @endif"
      @if(isset($input['add01']))
        value="{{ $input['add01'] }}"
      @else
      value="{{ old('add01') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('add01')}}</span>
     </p>        
</div>        

<p><b>都道府県</b></p>
<div class="form-group">                        
  <input type="text" name="add02"  class="form-control 
  @if(!empty($errors->first('add02')))
        border-danger
      @endif"
      @if(isset($input['add02']))
        value="{{ $input['add02'] }}"
      @else
      value="{{ old('add02') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('add02')}}</span>
     </p>        
</div>       

<p><b>以降の住所</b></p>
<div class="form-group">                        
  <input type="text" name="add03"  class="form-control 
  @if(!empty($errors->first('add03')))
        border-danger
      @endif"
      @if(isset($input['add03']))
        value="{{ $input['add03'] }}"
      @else
      value="{{ old('add03') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('add03')}}</span>
     </p>        
</div>     


<p><b>電話番号</b></p>
<div class="form-group">                        
  <input type="text" name="tel"  class="form-control 
  @if(!empty($errors->first('tel')))
        border-danger
      @endif"
      @if(isset($input['tel']))
        value="{{ $input['tel'] }}"
      @else
      value="{{ old('tel') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('tel')}}</span>
     </p>        
</div>     


<p><b>url</b></p>
<div class="form-group">                        
  <input type="text" name="url"  class="form-control 
  @if(!empty($errors->first('url')))
        border-danger
      @endif"
      @if(isset($input['url']))
        value="{{ $input['url'] }}"
      @else
      value="{{ old('url') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('url')}}</span>
     </p>        
</div>     


<p><b>契約締結日</b></p>
<p class="text-danger">※ 再度期限を設定してください</p>
<div class="form-group">   
<input type="date" name="date" value="<?php echo date('Y-m-d');?>">

</div>  

<p><b>ジャンル</b></p>   
<div class="form-group">              
<select name="genre" class="form-control">        
<option value="" selected>選択してください</option>
<option value="営業" @if(isset($input['genre']) && $input['genre'] == '営業' || old('genre')=='営業') selected  @endif>営業</option>
<option value="事務・オフィスワーク" @if(isset($input['genre']) && $input['genre'] == '事務・オフィスワーク' || old('genre')=='事務・オフィスワーク') selected  @endif>事務・オフィスワーク</option>
<option value="販売" @if(isset($input['genre']) && $input['genre'] == '販売' || old('genre')=='販売') selected  @endif>販売</option>
<option value="飲食" @if(isset($input['genre']) && $input['genre'] == '飲食' || old('genre')=='飲食') selected  @endif>飲食</option>
<option value="サービス・警備・清掃" @if(isset($input['genre']) && $input['genre'] == 'サービス・警備・清掃' || old('genre')=='サービス・警備・清掃') selected  @endif>サービス・警備・清掃</option>

<option value="イベント・レジャー・娯楽" @if(isset($input['genre']) && $input['genre'] == 'イベント・レジャー・娯楽' || old('genre')=='イベント・レジャー・娯楽') selected  @endif>イベント・レジャー・娯楽</option>

<option value="教育・カルチャー・スポーツ" @if(isset($input['genre']) && $input['genre'] == '教育・カルチャー・スポーツ' || old('genre')=='教育・カルチャー・スポーツ') selected  @endif>教育・カルチャー・スポーツ</option>

<option value="理・美容" @if(isset($input['genre']) && $input['genre'] == '理・美容' || old('genre')=='理・美容') selected  @endif>理・美容</option>

<option value="医療・介護・福祉" @if(isset($input['genre']) && $input['genre'] == '医療・介護・福祉' || old('genre')=='医療・介護・福祉') selected  @endif>医療・介護・福祉</option>

<option value="ドライバー・配達" @if(isset($input['genre']) && $input['genre'] == 'ドライバー・配達' || old('genre')=='ドライバー・配達') selected  @endif>ドライバー・配達</option>

<option value="製造・工場・倉庫" @if(isset($input['genre']) && $input['genre'] == '製造・工場・倉庫' || old('genre')=='製造・工場・倉庫') selected  @endif>製造・工場・倉庫</option>

<option value="IT・エンジニア" @if(isset($input['genre']) && $input['genre'] == 'IT・エンジニア' || old('genre')=='IT・エンジニア') selected  @endif>IT・エンジニア</option>

<option value="クリエイティブ・編集・出版" @if(isset($input['genre']) && $input['genre'] == 'クリエイティブ・編集・出版' || old('genre')=='クリエイティブ・編集・出版') selected  @endif>クリエイティブ・編集・出版</option>

<option value="専門職" @if(isset($input['genre']) && $input['genre'] == '専門職' || old('genre')=='専門職') selected  @endif>専門職</option>

<option value="土木・建設・農水産" @if(isset($input['genre']) && $input['genre'] == '土木・建設・農水産' || old('genre')=='土木・建設・農水産') selected  @endif>土木・建設・農水産</option>
</select>
</div>  




<p><b>備考欄</b></p>
<div class="form-group" >
<textarea name="note" rows="4" cols="170"  class="form-control" >
@if(isset($input['note']))
{{ $input['note'] }}
@else
@endif</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('note')}}</span>
     </p>   
</div>

<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


<br/><br/>        
<input type="submit" value="変更" class="btn btn-primary">    
</form>
<br>
@stop