@extends('layout/layout')
@section('content')    
   
<form method="post" action="/create" enctype="multipart/form-data">
<br>
<h2>会員登録</h2>
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


<p><b>ユーザーID</b></p>
<div class="form-group">                        
  <input type="text" name="name"  class="form-control 
      @if(!empty($errors->first('name'))) border-danger @endif"
      value="{{ old('name') }}">
      <p>
        <span class="help-block text-danger">{{$errors->first('name')}}</span>
     </p>        
</div>        

<div class="form-group" >            
<p><b>パスワード</b></p>           
   <input type="password" name="password"
    class="form-control @if(!empty($errors->first('name')))border-danger @endif">
   <p>
     <span class="help-block text-danger">
       {{$errors->first('password')}}
     </span>
   </p>    
</div>       



<br/><br/>        
<input type="submit" value="投稿" class="btn btn-primary">    
</form>
<br>
@stop