@extends('layout/layout')
@section('content')

   
<form method="post" action="/clientworksEdit/{{ $input['id'] }}">
<br>
<h2>案件編集</h2>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif {{ csrf_field() }}

<p><b>掲載期間</b></p>
<p class="text-danger">※ 再度期限を設定してください</p>
<div class="form-group">   
<input type="date" name="start" value="<?php echo date('Y-m-d');?>">
～
<input type="date" name="end" value="<?php echo date('Y-m-d');?>">
</div>  




<br><br><br>
<p><b>案件名</b></p>
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

<p><b>月額報酬</b></p>     
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


<p><b>開発期間</b></p>
<p class="text-danger">※ 再度期限を設定してください</p>
<div class="form-group">   
<input type="date" name="devstart" value="<?php echo date('Y-m-d');?>">
～
<input type="date" name="devend" value="<?php echo date('Y-m-d');?>">
</div>  

<p><b>業界</b></p>   
<div class="form-group">              
<select name="genre" class="form-control">        
<option value="" selected>選択してください</option>
<option value="営業" @if(isset($input['genre']) && $input['genre'] == '情報・通信' || old('genre')=='情報・通信') selected  @endif>情報・通信</option>
<option value="動画サービス" @if(isset($input['genre']) && $input['genre'] == '動画サービス' || old('genre')=='動画サービス') selected  @endif>動画サービス</option>
<option value="ゲーム" @if(isset($input['genre']) && $input['genre'] == 'ゲーム' || old('genre')=='ゲーム') selected  @endif>ゲーム</option>

<option value="教育" @if(isset($input['genre']) && $input['genre'] == '教育' || old('genre')=='教育') selected  @endif>教育</option>

<option value="医療・福祉" @if(isset($input['genre']) && $input['genre'] == '医療・福祉' || old('genre')=='医療・福祉') selected  @endif>医療・福祉</option>

<option value="銀行・証券・保険" @if(isset($input['genre']) && $input['genre'] == '銀行・証券・保険' || old('genre')=='銀行・証券・保険') selected  @endif>銀行・証券・保険</option>

<option value="不動産" @if(isset($input['genre']) && $input['genre'] == '不動産' || old('genre')=='不動産') selected  @endif>不動産</option>

<option value="EC・小売・流通" @if(isset($input['genre']) && $input['genre'] == 'EC・小売・流通' || old('genre')=='EC・小売・流通') selected  @endif>EC・小売・流通</option>

<option value="SNS・コミュニティ" @if(isset($input['genre']) && $input['genre'] == 'SNS・コミュニティ' || old('genre')=='SNS・コミュニティ') selected  @endif>SNS・コミュニティ</option>

<option value="交通・位置情報" @if(isset($input['genre']) && $input['genre'] == '交通・位置情報' || old('genre')=='交通・位置情報') selected  @endif>交通・位置情報</option>

<option value="旅行・宿泊・飲食" @if(isset($input['genre']) && $input['genre'] == '旅行・宿泊・飲食' || old('genre')=='旅行・宿泊・飲食') selected  @endif>旅行・宿泊・飲食</option>

<option value="広告" @if(isset($input['genre']) && $input['genre'] == '広告' || old('genre')=='広告') selected  @endif>広告</option>

<option value="メーカー" @if(isset($input['genre']) && $input['genre'] == 'メーカー' || old('genre')=='メーカー') selected  @endif>メーカー</option>

<option value="その他" @if(isset($input['genre']) && $input['genre'] == 'その他' || old('genre')=='その他') selected  @endif>その他</option>


</select>
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

<p><b>最寄り駅</b></p>
<div class="form-group">                        
  <input type="text" name="station"  class="form-control 
  @if(!empty($errors->first('station')))
        border-danger
      @endif"
      @if(isset($input['station']))
        value="{{ $input['station'] }}"
      @else
      value="{{ old('station') }}"
      @endif>
      <p>
        <span class="help-block text-danger">{{$errors->first('station')}}</span>
     </p>        
</div>        

<p><b>リモート開発</b></p>   
<div class="form-group">              
<select name="remote" class="form-control">        
<option value="" selected>選択してください</option>
<option value="リモート不可" @if(isset($input['remote']) && $input['remote'] == 'リモート不可' || old('remote')=='リモート不可') selected  @endif>リモート不可</option>
<option value="リモートの可能性あり" @if(isset($input['remote']) && $input['remote'] == 'リモートの可能性あり' || old('remote')=='リモートの可能性あり') selected  @endif>リモートの可能性あり</option>
<option value="完全リモート" @if(isset($input['remote']) && $input['remote'] == '完全リモート' || old('remote')=='完全リモート') selected  @endif>完全リモート</option>



</select>
</div>  


<p><b>使用言語</b></p>   
<div class="form-group">              
<select name="tool" class="form-control">        
<option value="" selected>選択してください</option>
<option value="JAVA" @if(isset($input['tool']) && $input['tool'] == 'JAVA' || old('tool')=='JAVA') selected  @endif>JAVA</option>

<option value="C言語、C++" @if(isset($input['tool']) && $input['tool'] == 'C言語、C++' || old('tool')=='C言語、C++') selected  @endif>C言語、C++</option>

<option value="C#" @if(isset($input['tool']) && $input['tool'] == 'C#' || old('tool')=='C#') selected  @endif>C#</option>
<option value="Javascript、jQuery、Html、CSS3" @if(isset($input['tool']) && $input['tool'] == 'Javascript、jQuery、Html、CSS3' || old('tool')=='JAVA') selected  @endif>Javascript、jQuery、Html、CSS3</option>

<option value="PHP" @if(isset($input['tool']) && $input['tool'] == 'PHP' || old('tool')=='PHP') selected  @endif>PHP</option>

<option value="Ruby" @if(isset($input['tool']) && $input['tool'] == 'Ruby' || old('tool')=='Ruby') selected  @endif>Ruby</option>

<option value="Python" @if(isset($input['tool']) && $input['tool'] == 'Python' || old('tool')=='PHP') selected  @endif>Python</option>

<option value="Objective-c、Swift" @if(isset($input['tool']) && $input['tool'] == 'Objective-c、Swift' || old('tool')=='Objective-c、Swift') selected  @endif>Objective-c、Swift</option>

</select>
</div>  

    


<p><b>職務内容</b></p>
<div class="form-group" >
<textarea name="jobcontent" rows="4" cols="170"  class="form-control" >
@if(isset($input['jobcontent']))
{{ $input['jobcontent'] }}
@else
@endif</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('jobcontent')}}</span>
     </p>   
</div>


<p><b>必須スキル</b></p>
<div class="form-group" >
<textarea name="required_skill" rows="4" cols="170"  class="form-control" >
@if(isset($input['required_skill']))
{{ $input['required_skill'] }}
@else
@endif</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('required_skill')}}</span>
     </p>   
</div>
 
<p><b>歓迎スキル</b></p>
<div class="form-group" >
<textarea name="Welcome_skills" rows="4" cols="170"  class="form-control" >
@if(isset($input['Welcome_skills']))
{{ $input['Welcome_skills'] }}
@else
@endif</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('Welcome_skills')}}</span>
     </p>   
</div>







<p><b>勤務地情報・備考欄</b></p>
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