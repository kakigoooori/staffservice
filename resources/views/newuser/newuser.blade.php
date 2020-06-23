@extends('layout/layout')
@section('content')    
   
<form method="post" action="/gamecreate" enctype="multipart/form-data">
<h2>ユーザ登録</h2>
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
<p><b>ユーザーID (20文字以内の半角英数字で)</b></p>
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

<div class="form-group" >            
<p><b>ニックネーム</b></p>           
   <input type="text" name="nickname"
    class="form-control @if(!empty($errors->first('nickname')))border-danger @endif">
   <p>
     <span class="help-block text-danger">
       {{$errors->first('nickname')}}
     </span>
   </p>    
</div>      


<p><b>E-mail</b></p>     
<div class="form-group">                    
<input type="email" name="email"  class="form-control
@if(!empty($errors->first('email')))
        border-danger
      @endif"
      value="{{ old('email') }}">
      <p>
      <span class="help-block text-danger">
        {{$errors->first('email')}}
      </span>
    </p>            
</div>       

<!-- radio -->        
<p><b>性別</b></p>
<div class="form-group
@if(!empty($errors->first('gender')))
    text-danger
    @endif">
    <div class="radio-inline">                
<label>            
<input type="radio" name="gender" value="男"
  @if (old('gender') == '男') checked @endif>男          
</label>        
</div>        

<div class="radio-inline">            
<label>            
<input type="radio" name="gender" value="女"
@if (old('gender') == '女') checked @endif>女        
</label>        
</div>

<p>
      <span class="help-block text-danger">
        {{$errors->first('gender')}}
      </span>
</p>
</div>



<label>住まい</label>    
<div class="form-group">              
<select name="area" class="form-control">        
<option value="" selected>選択してください</option>
<option value="1">北海道</option>
<option value="2">青森県</option>
<option value="3">岩手県</option>
<option value="4">宮城県</option>
<option value="5">秋田県</option>
<option value="6">山形県</option>
<option value="7">福島県</option>
<option value="8">茨城県</option>
<option value="9">栃木県</option>
<option value="10">群馬県</option>
<option value="11">埼玉県</option>
<option value="12">千葉県</option>
<option value="13">東京都</option>
<option value="14">神奈川県</option>
<option value="15">新潟県</option>
<option value="16">富山県</option>
<option value="17">石川県</option>
<option value="18">福井県</option>
<option value="19">山梨県</option>
<option value="20">長野県</option>
<option value="21">岐阜県</option>
<option value="22">静岡県</option>
<option value="23">愛知県</option>
<option value="24">三重県</option>
<option value="25">滋賀県</option>
<option value="26">京都府</option>
<option value="27">大阪府</option>
<option value="28">兵庫県</option>
<option value="29">奈良県</option>
<option value="30">和歌山県</option>
<option value="31">鳥取県</option>
<option value="32">島根県</option>
<option value="33">岡山県</option>
<option value="34">広島県</option>
<option value="35">山口県</option>
<option value="36">徳島県</option>
<option value="37">香川県</option>
<option value="38">愛媛県</option>
<option value="39">高知県</option>
<option value="40">福岡県</option>
<option value="41">佐賀県</option>
<option value="42">長崎県</option>
<option value="43">熊本県</option>
<option value="44">大分県</option>
<option value="45">宮崎県</option>
<option value="46">鹿児島県</option>
<option value="47">沖縄県</option>
</select>
</div>  


<div class="form-group" >
<p><b>紹介文</b></p>
<textarea name="note" rows="4" cols="130" value="" placeholder="例：ああああああああああああああああああ" ></textarea><br>
</div>


<p><b>サムネイル</b></p>
<br>
<div class="form-group" >  
<input type="file" name="image">
</div>   


<br/><br/>        
<input type="submit" value="登録" class="btn btn-primary">    
</form>

@stop