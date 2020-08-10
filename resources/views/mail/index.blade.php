@extends('layouts.base')

@section('title', 'Mail Example')

@section('main')
  <x-block about="メール送信">
    <p>{{ $type }}のサンプルメールを送信しました</p>
    <a href="{{ action('AuthController@home') }}">ホーム</a>
  </x-block>
@endsection
