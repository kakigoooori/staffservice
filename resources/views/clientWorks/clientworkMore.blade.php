@extends('layout/layout')
@section('content')

{{ csrf_field() }}
<div class="container">
<div class="row">
<div class="col-sm-8">
<div class="card" >

  <div class="card-header">
  <h2>{{ $input['name'] }}</h2>
  </div>
  <table class="table">
  <tr>
    <td>月額報酬</td>
    <td>
    {{ $input['price'] }}
    </td>
  </tr>

  <tr>
    <td>開発開始</td>
    <td>
    {{ $input['start'] }}
    </td>
  </tr>

  <tr>
    <td>開発終了</td>
    <td>
    {{ $input['end'] }}
    </td>
  </tr>


  <tr>
    <td>業界</td>
    <td>
    {{ $input['genre'] }}
    </td>
  </tr>

  <tr>
    <td>勤務地</td>
    <td>
    {{ $input['add01'] }}
    {{ $input['add02'] }}
    {{ $input['add03'] }}
    </td>
  </tr>
  
  <tr>
    <td>リモート開発</td>
    <td>
    {{ $input['remote'] }}
    </td>
  </tr>

  <tr>
    <td>使用言語</td>
    <td>
    {{ $input['tool'] }}
    </td>
  </tr>

  <tr>
    <td>職務内容</td>
    <td>
    {{ $input['jobcontent'] }}
    </td>
  </tr>
  
  <tr>
    <td>必須スキル</td>
    <td>
    {{ $input['required_skill'] }}
    </td>
  </tr>

  <tr>
    <td>歓迎スキル</td>
    <td>
    {{ $input['Welcome_skills'] }}
    </td>
  </tr>

  </table>

  <table class="table">
  <tr>
    <td>
      <h5>勤務地情報・備考欄</h5>
        <div class="card" >{!! nl2br(e( $input['note'] ))!!}
        </div>
    </td>
  </tr>
  </table>
  <p><a class="btn btn-primary" href=/csv/download/{{$input['id'] }} target="_blank"> CSV download その1</a></p>








</td>
</tr>
</table>

</div>
 </div>





 </div>
 </div>

 @stop