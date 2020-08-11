@extends('layouts.base')

@section('title', 'Profile Example')

@section('main')
  <x-block about="プロフィール">
    <ul>
      <li>権限：{{ $role }} </li>
      <li>名前：{{ $name }}</li>
      <li>メールアドレス：{{ $email }} </li>
    </ul>
    <p><a href="{{ action('AuthController@home') }}">ホーム</a></p>
  </x-block>
@endsection