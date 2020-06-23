@extends('layout/layout')
@section('content')


<form method="post" action="/mypage">

  <h1>Macthing station</h1>
<br>
<br>

  <h2>ログイン</h2>

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
  <label>ユーザーID</label>
  <div class="form-group">
    <input type="text" name="name"
    class="form-control @if(!empty($errors->first('name')))border-danger @endif"
    value="{{ old('name') }}">
  <p>
     <span class="help-block text-danger">{{$errors->first('name')}}</span>
  </p>
  </div>
  <label>パスワード</label>
  <div class="form-group ">
    <input type="password" name="password"
     class="form-control @if(!empty($errors->first('name')))border-danger @endif">
   <p>
    <span class="help-block text-danger">
      {{$errors->first('password')}}
   </span>
   </p>
  </div>
  <br>
  <input type="submit" value="ログイン" class="btn btn-primary">
</form>
<a href="/newuser" class="btn btn-success">新規登録</a>

@stop
</html>