@extends('layout/layout')
@section('content')


{{ csrf_field() }}
<div class="container">
<div class="row">
<div class="col-sm-8">
<div class="card" >

  <div class="card-header">
  <h2>{{ $input['work'] }}</h2>
  </div>
  <table class="table">
  <tr>
    <td>単価</td>
    <td>
    {{ $input['price'] }}
    </td>
  </tr>

  <tr>
    <td>ジャンル</td>
    <td>
    {{ $input['genre'] }}
    </td>
  </tr>

  <tr>
    <td>施工開始</td>
    <td>
    {{ $input['start'] }}
    </td>
  </tr>

  <tr>
    <td>施工完了</td>
    <td>
    {{ $input['end'] }}
    </td>
  </tr>
  
  </table>

  <table class="table">
  <tr>
    <td>
      <h5>施工内容</h5>
        <div class="card" >{!! nl2br(e( $input['worknote'] ))!!}
        </div>
    </td>
  </tr>
  </table>


  <table class="table">
  <tr>
    <td>
    <form method="get" action=#>
    <input type="submit" value="お気に入り登録" class="btn btn-danger">
    </form>
    </td>

    <td>
    <form method="get" action=#>
    <input type="submit" value="取引申請を送る" class="btn btn-success">
    </form>
    </td>
  </tr>
</table>

</div>
 </div>

 <div class="col-sm-3 text-center">
    <div class="card">
      <h5>出品者プロフィール</h5>
      <P>名前表示</P>
      <P>サムネイル表示</P>
      <P>プロフィール詳細へ</P>
      <P>出品者の一言</P>
      <P>メッセージで質問</P>
      <P>イイね</P>
      <P>違反通告</P>
  　</div>
     <br>
    <div class="card">
      <p>余りのスペース（広告等）</P>
    </div>
 </div>




 </div>
 </div>

 <br>
</body>
</html>

@stop