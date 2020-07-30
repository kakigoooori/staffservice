@extends('layout/layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
            <h2>担当者登録</h2>
            <br>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label for="area" class="col-md-4 control-label">事業所</label>

                            <div class="col-md-6">                              
                                     <select name="area" required class="form-control" >
                                        <option value="" selected>選択してください</option>
                                        <option value="新宿 本社">新宿 本社</option>
                                        <option value="渋谷">渋谷</option>
                                        <option value="池袋">池袋</option>
                                        <option value="大宮">大宮</option>
                                        <option value="横浜">横浜</option>
                                    </select> 
                                    
                                    @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">番号</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}" required>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Password 確認</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                            <label for="nickname" class="col-md-4 control-label">氏名</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" required>

                                @if ($errors->has('nickname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('authority') ? ' has-error' : '' }}">
                            <label for="authority" class="col-md-4 control-label">ユーザー種別</label>

                            <div class="col-md-6">                              
                                     <select name="authority" required class="form-control" >
                                        <option value="" selected>選択してください</option>
                                        <option value="マネージャー">マネージャー</option>
                                        <option value="サブマネージャー">サブマネージャー</option>
                                        <option value="コーディネーター">コーディネーター</option>
                                        <option value="アシスタント">アシスタント</option>
                                        <option value="スタッフ">スタッフ</option>
                                    </select> 
                                    
                                    @if ($errors->has('authority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('authority') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('team') ? ' has-error' : '' }}">
                            <label for="team" class="col-md-4 control-label">部署名</label>

                            <div class="col-md-6">                              
                                     <select name="team" required class="form-control" >
                                        <option value="" selected>選択してください</option>
                                        <option value="総務部">総務部</option>
                                        <option value="人事部">人事部</option>
                                        <option value="法務部">法務部</option>
                                        <option value="経理部">経理部</option>
                                        <option value="財務部">財務部</option>
                                        <option value="マーケティング部">マーケティング部</option>
                                        <option value="広報部">広報部</option>
                                        <option value="営業部">営業部</option>
                                        <option value="開発部">開発部</option>
                                        <option value="企画開発部">企画開発部</option>
                                        <option value="秘書室">秘書室</option>
                                        <option value="執行役員">執行役員</option>
                                    </select> 
                                    
                                    @if ($errors->has('team'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('team') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                            <label for="post" class="col-md-4 control-label">役職</label>

                            <div class="col-md-6">
                                <input id="post" type="text" class="form-control" name="post" value="{{ old('post') }}" required>

                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">電話</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control" name="tel" value="{{ old('tel') }}" required>

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
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

                        <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                            <label for="note" class="col-md-4 control-label">一言</label>

                                 <div class="col-md-6">
                                <textarea name="note" rows="4" cols="47" value="" placeholder="例：ああああああああああああああああああ" ></textarea><br>
                                 </div>
                        </div>

                        
                        <input type="hidden" name="image" value="">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
