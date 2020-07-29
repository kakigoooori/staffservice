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
  <td>
@if($like->users()->where('user_id', Auth::id())->exists())
<div class="col-md-4"> 
<form action="{{ route('unfavorites', $input['id']) }}" method="POST">
    {{ csrf_field() }}
      <input type="submit" value="イイね！を取り消す" class="fas btn btn-danger">
    </form>
  </div>
  @else
  <div class="col-md-4">
  <form action="{{ route('favorites', $input['id']) }}" method="POST">
    {{ csrf_field() }}
      <input type="submit" value="イイね！" class="fas btn btn-success">
    </form>
     </div>
  @endif
  <p>　いいね数：{{ $like->users()->count() }}</p>
  </td>

                    
<td>
<form method="post" action=/product/check/{{ $input['id'] }}>
{{ csrf_field() }}
<input type="hidden" name="user_id" value="{{ $userdata[0]->id }}">
<input type="hidden" name="login_id" value="{{ Auth::user()->id }}">
<input type="hidden" name="pool_id" value="{{ $input['id'] }}">
<input type="submit" value="取引申請を送る" class="btn btn-primary">
</form>
</td>
</tr>
</table>

</div>
 </div>

 <div class="col-sm-4 text-center">
    <div class="card">
       @if( $userdata[0]->image  == NULL)
       <figure>
      <img src="{{ asset('/img/base.jpg')}}" width="100px" height="100px">
      </figure>
      @else
      <figure>
      <img src="/storage/images/{{ $userdata[0]->id }}.jpg" width="125px" height="125px">
      </figure>
      @endif

    
      <P>出品者の一言</P>

      <P>{!! nl2br(e(  $userdata[0]->note ))!!}</P>
     
      <table>
 
    <a href="/profile/{{ $userdata[0]->id }}" class="btn btn-warning">プロフィールを見る</a>
    

    <table class="table">
    <a href="/mypage/chat/{{ $userdata[0]->id }}" class="btn btn-primary">メッセージを送信する</a>
    <tr>
    <td>
    <form method="get" action=#>
    <input type="submit" value="違反通告" class="btn btn-danger">
    </form>
    </td>

    <td>
    <form method="get" action=#>
    <input type="submit" value="イイね！" class="btn btn-success">
    </form>
    </td>
    </tr>
    </table>

  
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