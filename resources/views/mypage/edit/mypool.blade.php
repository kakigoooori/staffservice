@extends('layout/layout')
@section('content')

   
<form method="post" action="/mypool_edit/{{ $input['id'] }}">
<br>
<h2>商品編集フォーム</h2>
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
<p><b>依頼名</b></p>
<div class="form-group">                        
  <input type="text" name="work"  class="form-control 
  @if(!empty($errors->first('work')))
        border-danger
      @endif"
      @if(isset($input['work']))
        value="{{ $input['work'] }}"
      @else
      value="{{ old('work') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('work')}}</span>
     </p>        
</div>        

<p><b>単価</b></p>     
<div class="form-group">                    
<input type="text" name="price"  class="form-control
@if(!empty($errors->first('price')))
        border-danger
      @endif"
      @if(isset($input['price']))
        value="{{ $input['price'] }}"
      @else
      value="{{ old('price') }}"
      @endif>
      <p>
      <span class="help-block text-danger">
        {{$errors->first('price')}}
      </span>
    </p>            
</div>       


<p><b>ジャンル</b></p>   
<div class="form-group">              
<select name="genre" class="form-control">        
<option value="" selected>選択してください</option>
<option value="建築" @if(isset($input['genre']) && $input['genre'] == '建築' || old('genre')=='建築') selected  @endif>建築</option>
<option value="土木" @if(isset($input['genre']) && $input['genre'] == '土木' || old('genre')=='土木') selected  @endif>土木</option>
<option value="電気工事" @if(isset($input['genre']) && $input['genre'] == '電気工事' || old('genre')=='電気工事') selected  @endif>電気工事</option>
<option value="管工事" @if(isset($input['genre']) && $input['genre'] == '管工事' || old('genre')=='管工事') selected  @endif>管工事</option>
<option value="造園施工" @if(isset($input['genre']) && $input['genre'] == '造園施工' || old('genre')=='造園施工') selected  @endif>造園施工</option>
<option value="建設機械" @if(isset($input['genre']) && $input['genre'] == '建設機械' || old('genre')=='建設機械') selected  @endif>建設機械</option>
<option value="電気通信" @if(isset($input['genre']) && $input['genre'] == '電気通信' || old('genre')=='電気通信') selected  @endif>電気通信</option>
</select>
</div>  


<p><b>施工期限</b></p>
<p class="text-danger">※ 再度期限を設定してください</p>
<div class="form-group">   
<input type="date" name="start" value="<?php echo date('Y-m-d');?>">
～
<input type="date" name="end" value="<?php echo date('Y-m-d');?>">
</div>  


<p><b>施工内容</b></p>
<div class="form-group" >
<textarea name="worknote" rows="4" cols="170"  class="form-control" >
@if(isset($input['worknote']))
{{ $input['worknote'] }}
@else
@endif</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('worknote')}}</span>
     </p>   
</div>

<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


<br/><br/>        
<input type="submit" value="投稿" class="btn btn-primary">    
</form>
<br>
@stop