@extends('layout/layout')
@section('content')

<link href="{{ asset('css/view.css') }}" rel="stylesheet">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href=/mypage>マイページ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/toukou>投稿一覧</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active" href=/mypage/chat/{{ Auth::user()->id }}>メッセージ</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/receive>受信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/send>送信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/change>登録内容変更</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/profile>プロフィール</a>
  </li>
</ul>

<h2>my bord!</h2>
<div class="container">
<div class="row">


<div class="col-sm-12">
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">{{ $input['nickname'] }}の掲示板です。メッセージを残していってね！</div>
            <div class="card-body chat-card">
            @foreach ($comments as $item)

            @if($input['id']==$item->bord_id)

    @include('components.comment', ['item' => $item])

    @else <!--何も表示しない-->
  
    @endif

            @endforeach

  

            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{route('add')}}">
{{ csrf_field() }}
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="comment" placeholder="push massage (shift + Enter)"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                <input type="hidden" name="bord_id" value="{{ $input['id'] }}">
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">投稿</button>
        </div>
    </div>
</form>
</div>

</div>
</div>
@stop
