@extends('layout/layout')
@section('content')

</head>
<h1>ここから先は会員専用メニューです<br>
会員登録を済ませてからご利用ください。</h1>


<br><br><br>

<form method="get" action="/login">
<input type="submit" value="会員の方はこちら" class="btn btn-primary">
</form>
<br>
<form method="get" action="/register">
<input type="submit" value="新規登録する" class="btn btn-success">
</form>
<br>


@stop