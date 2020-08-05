@extends('layouts.base')

@section('title', 'Home Example')

@section('main')
  <x-block about="ホーム画面">
    <p>ようこそ、{{ $name }}さん。</p>
    <p><a class="btn btn-primary" href="{{ action('AuthController@pay') }} ">支払実行（仮）</a></p>
    <ul>
      <li><a href="{{ action('AuthorizationController@index') }} ">ゲート認可</a></li>
      <li><a href="{{ route('books') }} ">ポリシー認可を利用したモデル操作</a></li>
      <li><a href="{{ action('AuthController@profile') }} ">プロフィール</a></li>
      <li><a href="{{ action('Auth\LoginController@logout') }} ">ログアウト</a></li>
    </ul>
  </x-block>
@endsection