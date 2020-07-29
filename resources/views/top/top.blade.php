@extends('layout/layout')
@section('content')

</head>
<h1>staff service</h1>

<div id="carousel-1" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-1" data-slide-to="1"></li>
    <li data-target="#carousel-1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('/img/work1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('/img/work2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('/img/work3.jpg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<h1>topページだよaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>

<form class="form-inline my-2 my-lg-0" action="{{url('/search')}}" method="GET">
      <input class="form-control mr-sm-2" type="search" placeholder="仕事名をいれてみて"  name="work" value="">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
    </form>

@stop