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


<nav class="navbar navbar-expand-sm navbar-dark bg-dark bg-dark mt-3 mb-3">
<a class="navbar-brand" href="/top"><img alt="ロゴ" src="{{ asset('/img/logo.jpg') }}"width="40" height="auto">スタッフにメールを送信します</a>
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
        <div class="col-sm">
            
        
        
        <div class="row text-center"> © 2020. Made with  by hashimoto&kuse</div>
        </div>
        
        
    </footer>
</body>
</html>


