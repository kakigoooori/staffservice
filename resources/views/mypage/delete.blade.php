@extends('layout/layout')
@section('content')    
   
<br>
<h2>退会処理</h2>
<br>
<br>
<div class="container">

<div class="row">
<div class="col-sm-12">
<div class="card" >
<h5 class="text-danger">※ 一度押すと二度と元には戻りません。よろしいですか？？</h5>
<h5 class="text-danger">再び会員専用メニューを使うには再度『新規登録』が必要となります。</h5>
<p><a href="/delete">退会</a>する</P>
<br>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
<div class="card" >
<h5 >考え直す場合はこちらから</h5>
<a href="/top">戻る</a>
<br>
</div>
<br>
</div>
</div>
</div>
@stop