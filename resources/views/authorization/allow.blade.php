@extends('layouts.base')

@section('title', 'Authorization Example')

@section('main')
  <x-block about="ゲート認可完了">
    <p>ゲート認可をパスしました。</p>
    <a href="{{ action('AuthController@home') }}">ホーム</a>
  </x-block>
@endsection