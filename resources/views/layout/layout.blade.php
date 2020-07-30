<!doctype html>
<html lang="ja">

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  {{-- jQuery読み込み --}}
  <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  
  <!--footer css読み込み-->
  <link href="{{asset('css/footer.css')}}" rel="stylesheet">

  <!--alert js 読み込み-->
  
 <script src="{{ asset('js/alert.js') }}"></script>

  {{-- bootstrap4読み込み --}}
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script>
    {{--@yield('script')--}}
  </script>

</head>


<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="/top"><img alt="ロゴ" src="{{ asset('/img/logo.png') }}">staffservice</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/top">ホーム <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pool">投稿する</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/search">検索リスト</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/client">サイト概要</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">お問い合わせ</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          マイページ
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mypage">top</a>
          <a class="dropdown-item" href="/mypage/toukou">投稿一覧</a>
          <a class="dropdown-item" href="/mypage/chat">メッセージ</a>
          <a class="dropdown-item" href="/mypage/receive">受信管理</a>
          <a class="dropdown-item" href="/mypage/send">送信管理</a>
          <a class="dropdown-item" href="/mypage/change">登録内容変更</a>
          <a class="dropdown-item" href="/mypage/profile">プロフィール</a>
        </div>
      </li>
      </ul>
                   <ul class="nav navbar-nav navbar-right">
                        <!-- ログイン -->
                        @if (Auth::guest())
                            <li><a class="btn btn-success" href="{{ route('login') }}">ログイン</a></li>
                            <li><a class="btn btn-info" href="{{ route('register') }}">新規登録</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="#">  {{ Auth::user()->nickname }}様</a></li>
                                <li>
                                        <a class="btn btn-warning" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        </form>                                  
                                    </li>
                        @endif
                    </ul>
  </div>
</nav>
<br>
  <div class="container">
    @yield('content')
  </div>

  
  <!--   FOOTER START================== -->
  <br>
  <footer class="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <h4 class="title">Matching Station</h4>
            <p>「一人ひとりが『自分のストーリー』を生きていく世の中をつくる」
            わたしたちは、そんな「商い」の原点を体験できる機会を提供します。</p>
            </div>
        <div class="col-sm-3">
            <h4 class="title">サイト情報</h4>
            <span class="acount-icon">          
            <a href="terms_of_service"><i class="fa fa-heart" aria-hidden="true"></i>利用規約</a>
            <a href="company"><i class="fa fa-cart-plus" aria-hidden="true"></i>運営会社</a>
            <a href="/law"><i class="fa fa-user" aria-hidden="true"></i>特定商取引法の表示 </a>
            <a href="privacy"><i class="fa fa-globe" aria-hidden="true"></i>プライバシーポリシー</a>           
          </span>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Category</h4>
            <div class="category">
            <a href="/top">サイトTOP</a>
            <a href="/search">検索</a>
            <a href="/client">サイト概要</a>
            <a href="/pool">投稿</a>
            <a href="/contact">お問い合わせ</a>   
            </div>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Link</h4>
            <p><a href="https://twitter.com/home"><img src="{{ asset('/img/Twitter.png') }}" class="icon">twitter</a></p>
            <p><a href="https://www.youtube.com/"><img src="{{ asset('/img/youtube.png') }}" class="icon">Youtube</a></p>
            <p><a href="https://www.youtube.com/"><img src="{{ asset('/img/Instagram.png') }}" class="icon">Instagram</a></p>
           
            </div>
        </div>
        <hr>
        
        <div class="row text-center"> © 2020. Made with  by hashimoto&kuse</div>
        </div>
        
        
    </footer>
</body>
</html>


