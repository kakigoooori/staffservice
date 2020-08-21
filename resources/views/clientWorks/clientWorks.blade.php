@extends('layout/layout')
@section('content')    
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

<form method="post" action="/clientWorks" enctype="multipart/form-data">
<br>
<h2>案件登録</h2>
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
<p><b>案件名</b></p>
<div class="form-group">                        
  <input type="text" name="name"  class="form-control 
      @if(!empty($errors->first('name'))) border-danger @endif"
      value="{{ old('name') }}">
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
      value="{{ old('price') }}">
      <p>
      <span class="help-block text-danger">
        {{$errors->first('price')}}
      </span>
    </p>            
</div>       


<p><b>開発期間</b></p>
<div class="form-group">   
<input type="date" name="start" value="<?php echo date('Y-m-d');?>">
～
<input type="date" name="end" value="<?php echo date('Y-m-d');?>">
</div>  


<p><b>業界</b></p>   
<div class="form-group">              
<select name="genre" class="form-control
@if(!empty($errors->first('genre')))
        border-danger
      @endif"        
      value="{{ old('genre') }}">

<option value="" selected>選択してください</option>
<option value="情報・通信">情報・通信</option>
<option value="動画サービス">動画サービス</option>
<option value="ゲーム">ゲーム</option>
<option value="教育">教育</option>
<option value="医療・福祉">医療・福祉</option>
<option value="銀行・証券・保険">銀行・証券・保険</option>
<option value="不動産">不動産</option>
<option value="EC・小売・流通">EC・小売・流通</option>
<option value="SNS・コミュニティ">SNS・コミュニティ</option>
<option value="交通・位置情報">交通・位置情報</option>
<option value="旅行・宿泊・飲食">旅行・宿泊・飲食</option>
<option value="広告">広告</option>
<option value="メーカー">メーカー</option>
<option value="その他">その他</option>
</select>
</div>  

<label for="add01" class=col-md-4 control-label>勤務地</label>
 
<!-- ▼郵便番号入力フィールド(7桁) -->
<div class="col-md-6">  
<input type="text" name="add01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','add02','add03');">郵便番号(７桁)
</div> 
<!-- ▼住所入力フィールド(都道府県) -->
<label for="add02" class=col-md-4 control-label>都道府県</label>
<div class="col-md-6">  
<input type="text" name="add02" size="20">
</div> 
<!-- ▼住所入力フィールド(都道府県以降の住所) -->
<div class="col-md-6">  
<label for="add03" class=col-md-4 control-label>以降の住所</label>
<input type="text" name="add03" size="60">
</div> 

<p><b>リモート開発</b></p>   
<div class="form-group">              
<select name="remote" class="form-control
@if(!empty($errors->first('remote')))
        border-danger
      @endif"        
      value="{{ old('remote') }}">

<option value="" selected>選択してください</option>
<option value="リモート不可">リモート不可</option>
<option value="リモートの可能性あり">リモートの可能性あり</option>
<option value="完全リモート">完全リモート</option>

</select>
</div>  


<p><b>使用言語</b></p>   
<div class="form-group">              
<select name="tool" class="form-control
@if(!empty($errors->first('tool')))
        border-danger
      @endif"        
      value="{{ old('tool') }}">

<option value="" selected>選択してください</option>
<option value="JAVA">JAVA</option>
<option value="C言語、C++">C言語、C++</option>
<option value="C#">C#</option>
<option value="Javascript、jQuery、Html、CSS3">Javascript、jQuery、Html、CSS3</option>
<option value="PHP">PHP</option>
<option value="Ruby">Ruby</option>
<option value="Python">Python</option>
<option value="Objective-c、Swift">Objective-c、Swift</option>

</select>
</div>  

<p><b>職務内容</b></p>
<div class="form-group" >
<textarea name="jobcontent" rows="4" cols="130" class="form-control 
      @if(!empty($errors->first('jobcontent'))) border-danger @endif"
      value="" placeholder="例：ECサイトの大規模開発">{{ old('jobcontent') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('jobcontent')}}</span>
     </p>   
</div>

<p><b>必須スキル</b></p>
<div class="form-group" >
<textarea name="required_skill" rows="4" cols="130" class="form-control 
      @if(!empty($errors->first('required_skill'))) border-danger @endif"
      value="" placeholder="例：phpの開発経験2年以上">{{ old('required_skill') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('required_skill')}}</span>
     </p>   
</div>

<p><b>歓迎するスキル</b></p>
<div class="form-group" >
<textarea name="Welcome_skills" rows="4" cols="130" class="form-control 
      @if(!empty($errors->first('Welcome_skills'))) border-danger @endif"
      value="" placeholder="例：ツールの作成が可能なプログラミング能力（言語不問）
OS、各種ミドルウェア、データベースの設定・パフォーマンスチューニング
CIや自動構成管理 運用経験
インフラ（Linux）構築経験・運用経験">{{ old('Welcome_skills') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('Welcome_skills')}}</span>
     </p>   
</div>

<p><b>勤務地情報・備考</b></p>
<div class="form-group" >
<textarea name="note" rows="4" cols="130" class="form-control 
      @if(!empty($errors->first('note'))) border-danger @endif"
      value="" placeholder="例：新宿駅徒歩5分">{{ old('note') }}
</textarea>
      <p>
        <span class="help-block text-danger">{{$errors->first('note')}}</span>
     </p>   
</div>



<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


<br/><br/>        
<input type="submit" value="登録" class="btn btn-primary">    
</form>
<br>
@stop