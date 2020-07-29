@extends('layout/layout')
@section('content')


<form method="post" action="/contact" enctype="multipart/form-data">
<br>
<h2>お問い合わせフォーム</h2>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif {{ csrf_field() }}

<br><br>
<h5>お問い合わせ内容を入力してください。</h5>
<br>
<p><b>お問い合わせ種類</b></p>   
<div class="form-group">              
<select name="contact_genre" class="form-control">        
<option value="" selected>選択してください</option>
<option value="建築">ユーザー間のトラブル</option>
<option value="土木">退会</option>
<option value="電気工事">会員登録・再登録・ログイン</option>
<option value="管工事">違反通告</option>
<option value="造園施工">各種設定方法</option>
<option value="建設機械">意見・要望</option>
<option value="電気通信">その他</option>
</select>
</div>  
<br>
<p><b>お問い合わせ内容</b></p>
<div class="form-group" >
<textarea name="contact_note" rows="4" cols="130" class="form-control 
      @if(!empty($errors->first('contact_note'))) border-danger @endif"
      value="" placeholder="スムーズに問題を解決するため、具体的な要望などお願いいたします。">{{ old('contact_note') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('contact_note')}}</span>
     </p>   
</div>


<h5>お客様情報を入力してください。</h5>
<br>
<p><b>お名前</b></p>
<div class="form-group">                        
  <input type="name" name="name"  class="form-control 
      @if(!empty($errors->first('name'))) border-danger @endif"
      value="{{ old('name') }}">
      <p>
        <span class="help-block text-danger">{{$errors->first('name')}}</span>
     </p>        
</div>        

<p><b>メールアドレス</b></p>     
<div class="form-group">                    
<input type="email" name="email"  class="form-control
@if(!empty($errors->first('price')))
        border-danger
      @endif"
      value="{{ old('email') }}">
      <p>
      <span class="help-block text-danger">
        {{$errors->first('email')}}
      </span>
    </p>            
</div>       

<br/><br/>        
<input type="submit" value="送信する" class="btn btn-primary">    
</form>
<br>



@stop