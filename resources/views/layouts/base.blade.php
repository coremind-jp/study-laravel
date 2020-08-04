<! DOCTYPE html>
<html>
  <head>
    <meta charset =" UTF-8" />
    <title>@yield('title', 'COREMIND')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  </head>
  <body>
    <x-header />

    @section('main')
    <p>基底コンテンツ</p>
    @show

    <hr>
    
    <p class="text-center">Copyright(c) 2013-2020, COREMIND All Right Reserved.</p>
  </body>
</html>
