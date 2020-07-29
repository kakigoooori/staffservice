@extends('layout/layout')
@section('content')


{{ csrf_field() }}



<h2>取引申請が完了しました。</h2>
<br>
<h2>{{ Auth::user()->nickname }}様宛に、確認用のメールを送らせていただきました。</h2>
<br>
<br>
<h2>他の取引債を探す➡<a href=/search>CLICK</a></h2>


<h2>取引の申込一覧に行く➡<a href=/mypage/send>CLICK</a></h2>

@stop