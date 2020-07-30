@extends('layout/layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
            <h2>クライアント新規登録</h2>
            <br>
                <div class="panel-body">
                <form method="post" action="/client" enctype="multipart/form-data">
<br>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ユーザーID</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        
                        

                        
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label for="area" class="col-md-4 control-label">　住まい</label>

                            <div class="col-md-6">                              
                                     <select name="area" required class="form-control" >
                                        <option value="" selected>選択してください</option>
                                        <option value="北海道">北海道</option>
                                        <option value="青森県">青森県</option>
                                        <option value="岩手県">岩手県</option>
                                        <option value="宮城県">宮城県</option>
                                        <option value="秋田県">秋田県</option>
                                        <option value="山形県">山形県</option>
                                        <option value="福島県">福島県</option>
                                        <option value="茨城県">茨城県</option>
                                        <option value="栃木県">栃木県</option>
                                        <option value="群馬県">群馬県</option>
                                        <option value="埼玉県">埼玉県</option>
                                        <option value="千葉県">千葉県</option>
                                        <option value="東京都">東京都</option>
                                        <option value="神奈川県">神奈川県</option>
                                        <option value="新潟県">新潟県</option>
                                        <option value="富山県">富山県</option>
                                        <option value="石川県">石川県</option>
                                        <option value="福井県">福井県</option>
                                        <option value="山梨県">山梨県</option>
                                        <option value="長野県">長野県</option>
                                        <option value="岐阜県">岐阜県</option>
                                        <option value="静岡県">静岡県</option>
                                        <option value="愛知県">愛知県</option>
                                        <option value="三重県">三重県</option>
                                        <option value="滋賀県">滋賀県</option>
                                        <option value="京都府">京都府</option>
                                        <option value="大阪府">大阪府</option>
                                        <option value="兵庫県">兵庫県</option>
                                        <option value="奈良県">奈良県</option>
                                        <option value="和歌山県">和歌山県</option>
                                        <option value="鳥取県">鳥取県</option>
                                        <option value="島根県">島根県</option>
                                        <option value="岡山県">岡山県</option>
                                        <option value="広島県">広島県</option>
                                        <option value="山口県">山口県</option>
                                        <option value="徳島県">徳島県</option>
                                        <option value="香川県">香川県</option>
                                        <option value="愛媛県">愛媛県</option>
                                        <option value="高知県">高知県</option>
                                        <option value="福岡県">福岡県</option>
                                        <option value="佐賀県">佐賀県</option>
                                        <option value="長崎県">長崎県</option>
                                        <option value="熊本県">熊本県</option>
                                        <option value="大分県">大分県</option>
                                        <option value="宮崎県">宮崎県</option>
                                        <option value="鹿児島県">鹿児島県</option>
                                        <option value="沖縄県">沖縄県</option>
                                    </select> 
                                    
                                    @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif
                            </div>
                       

                        <p><b>　職種一覧</b></p>   
<div class="form-group">              
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

                        
                        <

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="登録" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection