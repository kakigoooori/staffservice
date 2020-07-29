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
    <a class="nav-link  active" href=/mypage/send>送信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/change>登録内容変更</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/profile>プロフィール</a>
  </li>
</ul>


{{ csrf_field() }}
<h2>申し込み一覧</h2>
<br />
<p>取引申し込み中の仕事の一覧です</P>


<table class="table table-hover">
    <tr>
        <th>作業名</th>
        <th>値段</th>
        <th>ジャンル</th>
        <th>開始日</th>
        <th>完了納期</th>
        <th>製作者</th>
        <th>作業の詳細</th>
        <th>申請を取り消す</th>
        <th>相手の反応</th>
    </tr>
    
    @foreach (array_map(NULL,$pooldata,$userdata,$buyid) as [$menu,$key,$id])
  
    <tr>
        <td>{{ $menu->work }}</td>
        <td>{{ $menu->price }}</td>
        <td>{{ $menu->genre }}</td>
        <td>{{ $menu->start }}</td>
        <td>{{ $menu->end }}</td>
        <td>{{ $key->nickname }}</td>
        <td><a href="/product/{{ $menu->id }}" class="btn btn-success">確認する</a></td>
        <td><a href="/mypage/send/{{ $id->id }}" class="btn btn-danger" onClick="delete_alert(event);return false;">申請取り消し</a></td>
        @if($id->reaction == NULL)
        <td>{{ $id->reaction  }}</td>

        @elseif($id->reaction == '〇')
        <td><div class="text-center"><b><p class="text-info">{{ $id->reaction  }}</p></b></div></td>

        @else
        <td><div class="text-center"><b></b><p class="text-danger">{{ $id->reaction  }}</p></b></div></td>
        @endif
    </tr>
    @endforeach
  
</table>
 


@stop
