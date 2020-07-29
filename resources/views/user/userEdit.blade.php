@extends('layout/layout')
@section('title','ユーザー情報変更')

@section('content')

<h2>登録内容変更</h2>

<form method="post" action="/edit/{{ $input['id'] }}" enctype="multipart/form-data">
<h2>更新</h2>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
  @endif
  {{ csrf_field() }}

<label>名前</label>  
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
      <span class="help-block text-danger">
        {{$errors->first('name')}}
      </span>
    </p>        
</div>        

<label>E-mail</label>       
<div class="form-group">                    
<input type="email" name="email"  class="form-control
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

<label>年齢</label>   
<div class="form-group" >                    
<input type="text" name="age"  class="form-control
@if(!empty($errors->first('age')))
        border-danger
      @endif"
      @if(isset($input['age']))
        value="{{ $input['age'] }}"
      @else
      value="{{ old('age') }}"
      @endif>
      <p>
      <span class="help-block text-danger">
        {{$errors->first('age')}}
      </span>
    </p>            
</div>       

<label>エリア</label>    
<div class="form-group">              
<select name="area"  size="5" class="form-control">        
<option value="">選択してください</option>
<option value="option1"  @if(isset($input['area']) && $input['area'] == 'option1' || old('area')=='option1') selected  @endif>オプション1</option>
<option value="option2"  @if(isset($input['area']) && $input['area'] == 'option2' || old('area')=='option2') selected  @endif>オプション2</option>
</select>
</div>   
<br>

<p><b>性別</b></p>
<div class="form-group
@if(!empty($errors->first('gender')))
    text-danger
    @endif">
    <div class="radio-inline">                
<label>            
<input type="radio" name="gender" value="1"
   @if(isset($input['gender']) && $input['gender'] == 1 || old('gender') == 1) checked  @endif>男          
</label>        
</div>        

<div class="radio-inline">            
<label>            
<input type="radio" name="gender" value="2"
  @if(isset($input['gender']) && $input['gender'] == 2 || old('gender') == 2) checked   @endif>女        
</label>        
</div>

<p>
      <span class="help-block text-danger">
        {{$errors->first('gender')}}
      </span>
</p>
</div>

<p><b>告知メディア</b></p>
<div class="check-inline">            
<label>            
<input type="hidden" name="media1" value="0">
<input type="checkbox" name="media1" value="1" @if(isset($input['media1']) && $input['media1'] == 1 || old('media1') == 1) checked  @endif>Web       
</label>        
</div>        
<div class="check-inline">            
<label>            
<input type="hidden" name="media2" value="0">
<input type="checkbox" name="media2" value="2" @if(isset($input['media2']) && $input['media2'] == 2 || old('media2') == 1) checked  @endif>TV
</label> 
</div>   
<br>

<label>感想</label>  
<div class="form-group" >
<textarea name="note" rows="4" cols="170"  class="form-control" >
@if(isset($input['note']))
{{ $input['note'] }}
@else
@endif</textarea><br>
</div>   

<label>画像</label>  
<div class="form-group" @if(!empty($errors->first('image'))) has-error @endif" >  
<input type="file" name="image" >
<span class="help-block">{{$errors->first('image')}}</span>
</div>   


<br/>      
<input type="submit" value="更新" class="btn btn-primary"><br><br>
<a href="/article" class="btn btn-primary">一覧へ戻る</a>    
</form>
<br/><br/>  
@stop
@endsection