@extends('layout/layout')
@section('content')
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<form method="post" action="/documents/tuutiCheck">
{{ csrf_field() }}
<h2>労働者派遣通知書</h2>
<br><br>

<p>令和<input type="text" name="date"></p><br>

<p><input type="text" name="clientname">殿</p>

　　事業所　名称<input type="text" name="place"><br><br>
　　所在地<br><br>
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
<p>　　使用者　職氏名<input type="text" name="staffname">印</p><br>

<p>令和<input type="text" name="date2">付け労働者派遣契約に基づき次の者を派遣します。</p><br>

派遣対象業務	氏名	　ボックス性別　<select class="my_class" name="gender">
    <option value="男性">男性</option>
    <option value="女性">女性</option>
   
    
</select> </p><br><br>
就業時間	<input type="time" name="workstart" value="<?php echo date('Y-m-d');?>">
から
<input type="time" name="workend" value="<?php echo date('Y-m-d');?>">まで		<br><br>
	　		<br><br>

<p>2.　社会保険・雇用保険の被保険者資格取得届の提出の有無は次のとおりです。</p><br>

<p><textarea class="field" name="insurance" cols="70" rows="1"></textarea></p><br>
			
<p>無の場合の理由： 	<textarea class="field" name="why1" cols="70" rows="1"></textarea></p><br><br>
			
<p>無の場合の理由：	<textarea class="field" name="why2" cols="70" rows="1"></textarea></p><br><br>
			
<p>無の場合の理由：	<textarea class="field" name="why3" cols="70" rows="1"></textarea></p><br><br>
			
<p>無の場合の理由：	<textarea class="field" name="why4" cols="70" rows="1"></textarea></p>



<br><input type="submit" value="反映する" class="btn btn-primary">    </form>
@stop