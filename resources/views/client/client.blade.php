@extends('layout/layout')
@section('content')
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

<form method="post" action="/client" enctype="multipart/form-data"><br>
<h2>クライアント新規登録</h2>
<br>
<div class="panel-body">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="name" class="col-md-4 control-label">クライアント名</label>
<div class="col-md-6">
<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required >

 @if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('name_kana') ? ' has-error' : '' }}">
        <label for="name_kana"class="col-md-4 control-label">フリガナ</label>
        <div class="col-md-10">
        <input type="text" class="form-control{{ $errors->has('name_kana') ? ' is-invalid' : '' }}" name="name_kana" value="{{ old('name_kana') }}">
        @if ($errors->has('name_kana'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name_kana') }}</strong>
            </span>
        @endif
    </div>
    </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="office_name">
        <label for="office_name" class=col-md-4 control-label>事業所名</label>
        <div class="col-md-6">
        <input type="text" class="form-control{{ $errors->has('office_name') ? ' is-invalid' : '' }}" name="office_name" value="{{ old('office_name') }}"required>
        @if ($errors->has('office_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('office_name') }}</strong>
            </span>
        @endif
    </div>
    </div>
    <label for="add01" class=col-md-4 control-label>所在地</label>
 
<!-- ▼郵便番号入力フィールド(7桁) -->
<div class="col-md-6">  
<input type="text" name="add01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','add02','add03');">郵便番号(７桁)
</div> 
<!-- ▼住所入力フィールド(都道府県) -->
<label for="add01" class=col-md-4 control-label>都道府県</label>
<div class="col-md-6">  
<input type="text" name="add02" size="20">
</div> 
<!-- ▼住所入力フィールド(都道府県以降の住所) -->
<div class="col-md-6">  
<label for="add01" class=col-md-4 control-label>以降の住所</label>
<input type="text" name="add03" size="60">
</div> 

                       

<p><div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}"></p>
<p> <label for="tel" class="col-md-4 control-label">電話番号</label></p>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control" name="tel" value="{{ old('tel') }}" required>

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <p><div class="url"></p>
        <label for="url"class="col-md-4 control-label">URL</label>
        <div class="col-md-6">
        <input type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url') }}">
        @if ($errors->has('url'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
    </div>
    
    <p>　契約締結日</p>
<div class="col-md-6">   
<input type="date" name="date" value="{{ old('tel') }}">
</div>

                        <p>　職種一覧</p>   
<div class="col-md-6">              
<select name="genre" class="form-control">        
<option value="" selected>　　選択してください</option>
<option value="営業">営業</option>
<option value="事務・オフィスワーク">事務・オフィスワーク</option>
<option value="販売">販売</option>
<option value="飲食">飲食</option>
<option value="サービス・警備・清掃">サービス・警備・清掃</option>
<option value="イベント・レジャー・娯楽">イベント・レジャー・娯楽</option>
<option value="教育・カルチャー・スポーツ">教育・カルチャー・スポーツ</option>
<option value="理・美容">理・美容</option>
<option value="医療・介護・福祉">医療・介護・福祉</option>
<option value="ドライバー・配達">ドライバー・配達</option>
<option value="製造・工場・倉庫">製造・工場・倉庫</option>
<option value="IT・エンジニア">IT・エンジニア</option>
<option value="クリエイティブ・編集・出版">クリエイティブ・編集・出版</option>
<option value="専門職">専門職</option>
<option value="土木・建設・農水産">土木・建設・農水産</option>
</select>
</div>  
                        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                            
                            <label for="note" class="col-md-4 control-label">備考欄</label>

                                 <div class="col-md-6">
                                <textarea name="note" rows="4" cols="47" value="" placeholder="例：ああああああああああああああああああ" ></textarea><br>
                                 </div>
                        </div>

                        
                        
</div>
</div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="登録" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                
           
        
    

@stop