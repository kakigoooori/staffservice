@extends('layout/layout')
@section('content')


{{ csrf_field() }}
<h2>労働者派遣通知書</h2>
<br><br>

<p>令和{{ $input['date'] }}
    <input type="hidden" name="date" value="{{ $input['date'] }}"></p><br>

<p>{{ $input['clientname'] }}
    <input type="hidden" name="clientname" value="{{ $input['clientname'] }}">殿</p>

　　事業所　名称{{ $input['place'] }}
    <input type="hidden" name="place" value="{{ $input['place'] }}"><br><br>
　　所在地<br><br>

{{ $input['add01'] }}
    <input type="hidden" name="add01" value="{{ $input['add01'] }}"><br>

 
{{ $input['add02'] }}
    <input type="hidden" name="add02" value="{{ $input['add02'] }}">

{{ $input['add03'] }}
    <input type="hidden" name="add03" value="{{ $input['add03'] }}">

<p>　　使用者　職氏名{{ $input['staffname'] }}
    <input type="hidden" name="staffname" value="{{ $input['staffname'] }}">　印</p><br>

<p>令和{{ $input['date2'] }}
    <input type="hidden" name="date2" value="{{ $input['date2'] }}">付け労働者派遣契約に基づき次の者を派遣します。</p><br>

派遣対象業務	氏名	　{{ $input['staffname'] }}
    <input type="hidden" name="staffname" value="{{ $input['staffname'] }}">性別　{{ $input['gender'] }}
    <input type="hidden" name="gender" value="{{ $input['gender'] }}">
   
    
</select> </p><br><br>
就業時間	{{ $input['workstart'] }}
    <input type="hidden" name="workstart" value="{{ $input['workstart'] }}">
から
{{ $input['workend'] }}
    <input type="hidden" name="workend" value="{{ $input['workend'] }}">まで		<br><br>
	　		<br><br>

<p>2.　社会保険・雇用保険の被保険者資格取得届の提出の有無は次のとおりです。</p><br>

<p>{{ $input['insurance'] }}
    <input type="hidden" name="insurance" value="{{ $input['insurance'] }}"></p><br>
			
<p>無の場合の理由： 	{{ $input['why1'] }}
    <input type="hidden" name="why1" value="{{ $input['why1'] }}"></p><br><br>
			
<p>無の場合の理由：	{{ $input['why2'] }}
    <input type="hidden" name="why2" value="{{ $input['why2'] }}"></textarea></p><br><br>
			
<p>無の場合の理由：	{{ $input['why3'] }}
    <input type="hidden" name="why3" value="{{ $input['why3'] }}"></textarea></p><br><br>
			
<p>無の場合の理由：	{{ $input['why4'] }}
    <input type="hidden" name="why4" value="{{ $input['why4'] }}"></textarea></p>




@stop