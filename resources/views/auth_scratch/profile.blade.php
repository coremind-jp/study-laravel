@extends('layouts.base')

@section('title', 'Profile Example')

@section('main')
  <x-block about="プロフィール">
    <ul>
      <li>名前：{{ $name }}</li>
      <li>メールアドレス：{{ $email }} </li>
    </ul>
    <a href="{{ action('AuthController@home') }}">ホーム</a>
  </x-block>
@endsection