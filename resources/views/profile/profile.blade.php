@extends('layout/layout')
@section('content')

<h2>プロフィール</h2>
<br />
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="card" >
<br />
<div class="card-header">
<h5>出品者プロフィール</h5>
      @if( $input['image']  == NULL)
       <figure>
      <img src="{{ asset('/img/base.jpg')}}" width="100px" height="100px">
      </figure>
      @else
      <figure>
      <img src="/storage/images/{{ $input['id']  }}.jpg" width="125px" height="125px">
      </figure>
      @endif
      <h3> 『{{ $input['nickname'] }}』</h3>
</div>

<h5>所在地/{{ $input['area'] }}</h5>

<!--画像表示-->
                       
<div class="card-header">
<h5>自己紹介コメント</h5>

<h5>{!! nl2br(e( $input['note'] ))!!}</h5>
</div>

<table class="table">
<h3>掲載中のコンテンツ</h3>
@foreach ($pooldata as $pool)
<td>
<div class="card" class="col-md-4">
<img class="w-100" src="{{ asset('/img/work1.jpg')}}" alt="First slide">
  <div class="card-body">
    <h5 class="card-title">{{ $pool->work }}</h5>
    <p class="card-text">{!! nl2br(e( $pool->worknote))!!}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</td>
@endforeach
</table>

<div class="col-md-4">
<a href="/mypage/chat/{{ $input['id'] }}" class="btn btn-primary">メッセージを送信する</a>
</div>

</div>
</div>
</div>
</div>
@stop