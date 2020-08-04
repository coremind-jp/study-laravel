@extends('layouts.base')

@section('title', 'Home Example')

@section('main')
  <x-block about="ホーム画面">
    <p>ようこそ、{{ $name }}さん</p>
    <p><a class="btn btn-primary" href="{{ action('AuthController@pay') }} ">支払実行（仮）</a></p>
    <p><a href="{{ action('AuthController@profile') }} ">プロフィール</a></p>
    <p><a href="{{ action('Auth\LoginController@logout') }} ">ログアウト</a></p>
  </x-block>
@endsection