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

<h2>内容確認</h2>
<br>

<form method="post" action="/mypage/edit/done/{{ $input['id'] }}" id="edit_form" enctype="multipart/form-data" >

{{ csrf_field() }}

<table class="table table-striped">
  <tr>
    <td>ユーザーID</td>
    <td>
    {{ $input['name'] }}
    <input type="hidden" name="name" value="{{ $input['name'] }}">
    </td>
  </tr>

  <tr>
    <td>ニックネーム</td>
    <td>
    {{ $input['nickname'] }}
    <input type="hidden" name="nickname" value="{{ $input['nickname'] }}">
    </td>
  </tr>

  <tr>
   <td>性別</td>
   <td>
   @if ($input['gender'] === '男')
        男
      @else
        女
      @endif
    <input type="hidden" name="gender" value="{{ $input['gender'] }}">
   </td>
 </tr>

  <tr>
    <td>エリア</td>
    <td>
    {{ $input['area'] }}
    <input type="hidden" name="area" value="{{ $input['area'] }}">
    </td>
  </tr>

<tr>
    <td>一言</td>
    <td>
   {!! nl2br(e( $input['note'] ))!!}
    <input type="hidden" name="note" value="{{ $input['note'] }}">
    </td>
  </tr>

  <tr>
    <td>サムネイル</td>
    <td>
    
    @if($input['image'] == null)
    @if(file_exists('/storage/images/27.jpg'))
    <figure>
   <img src="/storage/images/{{ Auth::id() }}.jpg" width="100px" height="100px">
   <figcaption>画像の変更はありません</figcaption>
   </figure>
    @else
   <figure>
    <img src="/storage/images/base.jpg" width="100px" height="100px">
    <figcaption>デフォルト画像</figcaption>
    </figure>
    @endif
   @else
   <figure>
   <img src="/storage/images/{{ Auth::id() }}.jpg" width="100px" height="100px">
   <figcaption>変更後のプロフィール</figcaption>
   </figure>
   <input type="hidden" name="image" value="{{ $input['image'] }}">
   @endif
    </td>

</table>
<p>以上の内容で変更します。</p>
<br>
</form>

<div class="row">
<div class="col-sm-12">
<br>
<input type="submit" form="edit_form" value="更新" class="btn btn-primary"><br><br>
<button class="btn btn-primary" onclick="history.back()">フォームに戻る</button>
</div>
</div>

@stop