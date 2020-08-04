@push('styles')
  <link rel="stylesheet" href="{{ url('css/app.css') }} " />
@endpush

@push('scripts')
  <script src="{{ url('/js/app.js') }} "></script>
@endpush

<! DOCTYPE html>
<html>
  <head lang="ja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'COREMIND')</title>
    @stack('styles')
    @stack('scripts')
  </head>
  <body id="app">
    <x-header />

    @section('main')
    <p>基底コンテンツ</p>
    @show

    <hr>
    
    <p class="text-center">Copyright(c) 2013-2020, COREMIND All Right Reserved.</p>
  </body>
</html>
