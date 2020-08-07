<! DOCTYPE html>
<html>
  <head lang="ja">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    @stack('metas')

    <title>@yield('title', 'COREMIND')</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }} " />
    @stack('styles')
  </head>
  <body>
    <x-header />

    @section('main')
    <p>基底コンテンツ</p>
    @show

    <hr>
    
    <div id="app"></div>
    <p class="text-center">Copyright(c) 2013-2020, COREMIND All Right Reserved.</p>

    <script src="{{ url('/js/app.js') }} "></script>
    @stack('scripts')
  </body>
</html>
