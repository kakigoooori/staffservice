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
    <a class="nav-link active" href=/mypage/receive>受信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/send>送信管理</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=/mypage/change>登録内容変更</a>
  </li>
  
</ul>

<h2>受信管理</h2>
<br />
<p>あなたと取引したい方がいます。</p>
<br />
<table class="table table-hover">
    <tr>
        <th>ニックネーム</th>
        <th>申し込み日時</th>
        <th>取引希望の作業</th>
        <th>相手プロフィールの確認</th>
        <th>承諾する</th>
        <th>お断りする</th>
    </tr>
    
    @foreach (array_map(NULL,$pooldata,$userreceive,$buyid) as [$menu,$key,$id])
    @if($id->reaction == NULL)

    <tr>
        <td>{{ $key->nickname }}</td>
        <td>{{ $id->created_at }}</td>
        <td><a href="/product/{{ $menu->id }}">{{ $menu->work }}</a></td>
        <td><a href="/profile/{{ $key->id }}" class="btn btn-success">　　確認する　　</a></td>
        <form  method="post" action=/mypage/receive/{{ $id->id }}>
        {{ csrf_field() }}
        <input type="hidden" name="reaction" value="〇">
        <td><input type="submit"  class="btn btn-info" value="承諾する" onClick="ok_alert(event);return false;"></td>
        </form>

        <form  method="post" action=/mypage/receive/{{ $id->id }}>
        {{ csrf_field() }}
        <input type="hidden" name="reaction" value="×">
        <td><input type="submit"  class="btn btn-danger" value="お断りする" onClick="pass_alert(event);return false;"></td>
        </form>
    </tr>

    @elseif($id->reaction == '〇')
    <tr>
        <td>{{ $key->nickname }}</td>
        <td>{{ $id->created_at }}</td>
        <td><a href="/product/{{ $menu->id }}">{{ $menu->work }}</a></td>
        <td><a href="/profile/{{ $key->id }}" class="btn btn-success">　　確認する　　</a></td>
        <form  method="post" action=/mypage/receive/{{ $id->id }}>
        {{ csrf_field() }}
        <input type="hidden" name="reaction" value="〇">
       <td>承諾済みの内容です</td>
       <form  method="post" action=/mypage/receive/{{ $id->id }}>
        {{ csrf_field() }}
        <input type="hidden" name="reaction" value="×">
        <td><input type="submit"  class="btn btn-danger" value="お断りする" onClick="pass_alert(event);return false;"></td>
        </form>
    </tr>
    @else
    <tr>
        <td>{{ $key->nickname }}</td>
        <td>{{ $id->created_at }}</td>
        <td><a href="/product/{{ $menu->id }}">{{ $menu->work }}</a></td>
        <td><a href="/profile/{{ $key->id }}" class="btn btn-success">　　確認する　　</a></td>
        <form  method="post" action=/mypage/receive/{{ $id->id }}>
        {{ csrf_field() }}
        <input type="hidden" name="reaction" value="〇">
        <form  method="post" action=/mypage/receive/{{ $id->id }}>
        {{ csrf_field() }}
        <input type="hidden" name="reaction" value="〇">
        <td><input type="submit"  class="btn btn-info" value="承諾する" onClick="ok_alert(event);return false;"></td>
        </form>
       <td>お断り済みの内容です</td>
     </tr>
      @endif

    @endforeach
   
  
</table>


@stop