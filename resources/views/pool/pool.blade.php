@extends('layout/layout')
@section('content')    
   
<form method="post" action="/pool" enctype="multipart/form-data">
<br>
<h2>投稿フォーム</h2>
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
      @if(!empty($errors->first('work'))) border-danger @endif"
      value="{{ old('work') }}">
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
      value="{{ old('price') }}">
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
<option value="建築">建築</option>
<option value="土木">土木</option>
<option value="電気工事">電気工事</option>
<option value="管工事">管工事</option>
<option value="造園施工">造園施工</option>
<option value="建設機械">建設機械</option>
<option value="電気通信">電気通信</option>
</select>
</div>  


<p><b>施工期限</b></p>
<div class="form-group">   
<input type="date" name="start" value="<?php echo date('Y-m-d');?>">
～
<input type="date" name="end" value="<?php echo date('Y-m-d');?>">
</div>  


<p><b>施工内容</b></p>
<div class="form-group" >
<textarea name="worknote" rows="4" cols="130" class="form-control 
      @if(!empty($errors->first('worknote'))) border-danger @endif"
      value="" placeholder="例：空き缶拾い">{{ old('worknote') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('worknote')}}</span>
     </p>   
</div>


<br/><br/>        
<input type="submit" value="投稿" class="btn btn-primary">    
</form>
<br>
@stop