@extends('layout/layout')
@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href=/mypage>マイページ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/toukou>投稿一覧</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/chat/{{ Auth::user()->id }}>メッセージ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/receive>受信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/send>送信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href=/mypage/change>登録内容変更</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/profile>プロフィール</a>
  </li>
</ul>

<h2>登録内容変更</h2>
<p>正しい内容を入力してください</p>
<br/>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="card" >

<form class="form-horizontal" method="POST" action="/mypage/edit/{{ $input['id'] }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ユーザーID</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" required class="form-control"
                                 @if(isset($input['name']))
                                 value="{{ $input['name'] }}"
                                 @else
                                 value="{{ old('name') }}"
                                 @endif>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                            <label for="nickname" class="col-md-4 control-label">ニックネーム</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" name="nickname" required class="form-control" 

                                 @if(isset($input['nickname']))
                                 value="{{ $input['nickname'] }}"
                                 @else
                                 value="{{ old('nickname') }}"
                                 @endif>

                                @if ($errors->has('nickname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                            <label for="genre" class="col-md-4 control-label">性別</label>

                            <div class="col-md-6">
                                <div class="radio-inline">                
                                    <label>            
                                        <input type="radio" name="gender" required value="男"
                                        @if(isset($input['gender']) && $input['gender'] == "男" || old('gender') == "男") checked  @endif>男          
                                    </label>        
                                </div>        

                                <div class="radio-inline">            
                                    <label>            
                                        <input type="radio" name="gender" required value="女"
                                        @if(isset($input['gender']) && $input['gender'] == "女" || old('gender') == "女") checked   @endif>女        
                                    </label>        
                                </div>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label for="area" class="col-md-4 control-label">住まい</label>

                            <div class="col-md-6">                              
                                     <select name="area" required class="form-control" >
                                        <option value="" selected>選択してください</option>
                                        <option value="北海道" @if(isset($input['area']) && $input['area'] == '北海道' || old('area')=='北海道') selected  @endif>北海道</option>
                                        <option value="青森県" @if(isset($input['area']) && $input['area'] == '青森県' || old('area')=='青森県') selected  @endif>青森県</option>
                                        <option value="岩手県" @if(isset($input['area']) && $input['area'] == '岩手県' || old('area')=='岩手県') selected  @endif>岩手県</option>
                                        <option value="宮城県" @if(isset($input['area']) && $input['area'] == '宮城県' || old('area')=='宮城県') selected  @endif>宮城県</option>
                                        <option value="秋田県" @if(isset($input['area']) && $input['area'] == '秋田県' || old('area')=='秋田県') selected  @endif>秋田県</option>
                                        <option value="山形県" @if(isset($input['area']) && $input['area'] == '山形県' || old('area')=='山形県') selected  @endif>山形県</option>
                                        <option value="福島県" @if(isset($input['area']) && $input['area'] == '山形県' || old('area')=='山形県') selected  @endif>山形県</option>
                                        <option value="茨城県" @if(isset($input['area']) && $input['area'] == '山形県' || old('area')=='山形県') selected  @endif>山形県</option>
                                        <option value="栃木県" @if(isset($input['area']) && $input['area'] == '栃木県' || old('area')=='栃木県') selected  @endif>栃木県</option>
                                        <option value="群馬県" @if(isset($input['area']) && $input['area'] == '群馬県' || old('area')=='群馬県道') selected  @endif>群馬県</option>
                                        <option value="埼玉県" @if(isset($input['area']) && $input['area'] == '埼玉県' || old('area')=='埼玉県') selected  @endif>埼玉県</option>
                                        <option value="千葉県" @if(isset($input['area']) && $input['area'] == '千葉県' || old('area')=='千葉県') selected  @endif>千葉県</option>
                                        <option value="東京都" @if(isset($input['area']) && $input['area'] == '東京都' || old('area')=='東京都') selected  @endif>東京都</option>
                                        <option value="神奈川県" @if(isset($input['area']) && $input['area'] == '神奈川県' || old('area')=='神奈川県') selected  @endif>神奈川県</option>
                                        <option value="新潟県" @if(isset($input['area']) && $input['area'] == '新潟県' || old('area')=='新潟県') selected  @endif>新潟県</option>
                                        <option value="富山県" @if(isset($input['area']) && $input['area'] == '富山県' || old('area')=='富山県') selected  @endif>富山県</option>
                                        <option value="石川県" @if(isset($input['area']) && $input['area'] == '石川県' || old('area')=='石川県') selected  @endif>石川県</option>
                                        <option value="福井県" @if(isset($input['area']) && $input['area'] == '福井県' || old('area')=='福井県') selected  @endif>福井県</option>
                                        <option value="山梨県" @if(isset($input['area']) && $input['area'] == '山梨県' || old('area')=='山梨県') selected  @endif>山梨県</option>
                                        <option value="長野県" @if(isset($input['area']) && $input['area'] == '長野県' || old('area')=='長野県') selected  @endif>長野県</option>
                                        <option value="岐阜県" @if(isset($input['area']) && $input['area'] == '岐阜県' || old('area')=='岐阜県') selected  @endif>岐阜県</option>
                                        <option value="静岡県" @if(isset($input['area']) && $input['area'] == '静岡県' || old('area')=='静岡県') selected  @endif>静岡県</option>
                                        <option value="愛知県" @if(isset($input['area']) && $input['area'] == '愛知県' || old('area')=='愛知県') selected  @endif>愛知県</option>
                                        <option value="三重県" @if(isset($input['area']) && $input['area'] == '三重県' || old('area')=='三重県') selected  @endif>三重県</option>
                                        <option value="滋賀県" @if(isset($input['area']) && $input['area'] == '滋賀県' || old('area')=='滋賀県') selected  @endif>滋賀県</option>
                                        <option value="京都府" @if(isset($input['area']) && $input['area'] == '京都府' || old('area')=='京都府') selected  @endif>京都府</option>
                                        <option value="大阪府" @if(isset($input['area']) && $input['area'] == '大阪府' || old('area')=='大阪府') selected  @endif>大阪府</option>
                                        <option value="兵庫県" @if(isset($input['area']) && $input['area'] == '兵庫県' || old('area')=='兵庫県') selected  @endif>兵庫県</option>
                                        <option value="奈良県" @if(isset($input['area']) && $input['area'] == '奈良県' || old('area')=='奈良県') selected  @endif>奈良県</option>
                                        <option value="和歌山県" @if(isset($input['area']) && $input['area'] == '和歌山県' || old('area')=='和歌山県') selected  @endif>和歌山県</option>
                                        <option value="鳥取県" @if(isset($input['area']) && $input['area'] == '鳥取県' || old('area')=='鳥取県') selected  @endif>鳥取県</option>
                                        <option value="島根県" @if(isset($input['area']) && $input['area'] == '島根県' || old('area')=='島根県') selected  @endif>島根県</option>
                                        <option value="岡山県" @if(isset($input['area']) && $input['area'] == '岡山県' || old('area')=='岡山県') selected  @endif>岡山県</option>
                                        <option value="広島県" @if(isset($input['area']) && $input['area'] == '広島県' || old('area')=='広島県') selected  @endif>広島県</option>
                                        <option value="山口県" @if(isset($input['area']) && $input['area'] == '山口県' || old('area')=='山口県') selected  @endif>山口県</option>
                                        <option value="徳島県" @if(isset($input['area']) && $input['area'] == '徳島県' || old('area')=='徳島県') selected  @endif>徳島県</option>
                                        <option value="香川県" @if(isset($input['area']) && $input['area'] == '香川県' || old('area')=='香川県') selected  @endif>香川県</option>
                                        <option value="愛媛県" @if(isset($input['area']) && $input['area'] == '愛媛県' || old('area')=='愛媛県') selected  @endif>愛媛県</option>
                                        <option value="高知県" @if(isset($input['area']) && $input['area'] == '高知県' || old('area')=='高知県') selected  @endif>高知県</option>
                                        <option value="福岡県" @if(isset($input['area']) && $input['area'] == '福岡県' || old('area')=='福岡県') selected  @endif>福岡県</option>
                                        <option value="佐賀県" @if(isset($input['area']) && $input['area'] == '佐賀県' || old('area')=='佐賀県') selected  @endif>佐賀県</option>
                                        <option value="長崎県" @if(isset($input['area']) && $input['area'] == '長崎県' || old('area')=='長崎県') selected  @endif>長崎県</option>
                                        <option value="熊本県" @if(isset($input['area']) && $input['area'] == '熊本県' || old('area')=='熊本県') selected  @endif>熊本県</option>
                                        <option value="大分県" @if(isset($input['area']) && $input['area'] == '大分県' || old('area')=='大分県') selected  @endif>大分県</option>
                                        <option value="宮崎県" @if(isset($input['area']) && $input['area'] == '宮崎県' || old('area')=='宮崎県') selected  @endif>宮崎県</option>
                                        <option value="鹿児島県" @if(isset($input['area']) && $input['area'] == '鹿児島県' || old('area')=='鹿児島県') selected  @endif>鹿児島県</option>
                                        <option value="沖縄県" @if(isset($input['area']) && $input['area'] == '沖縄県' || old('area')=='沖縄県') selected  @endif>沖縄県</option>
                                    </select>   
                                    
                                    @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                            <label for="note" class="col-md-4 control-label">一言</label>

                                 <div class="col-md-6">
                                 <textarea name="note" rows="4"  class="form-control">@if(isset($input['note'])){{ $input['note'] }}
                                     @else
                                     @endif</textarea><br>
                           </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">サムネイル</label>

                            <div class="col-md-6">
                            <input id="image" type="file" name="image" >

                            @if(Auth::user()->image == null)
                            <figure>
                            <img src="/storage/images/base.jpg" width="100px" height="100px">
                            <figcaption>デフォルト画像</figcaption>
                            </figure>
                            @else
                            <figure>
                            <img src="/storage/images/{{ Auth::id() }}.jpg" width="100px" height="100px">
                            <figcaption>設定画像</figcaption>
                            </figure>
                            @endif


                            @if (session('success'))
                            <div class="alert alert-success">
                             {{ session('success') }}
                            </div>
                            @endif
                            
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    変更する
                                </button>
                            </div>
                        </div>
                    </form>

</form>
<br/><br/>  
</div>
</div>
</div>
</div>
@stop