@extends('layouts.base')

@section('title', 'Confirm Example')

@section('main')
  <x-block about="支払完了（仮）">
    <p>重要な処理の前に認証を挟むことができました</p>
    <p><a href="{{ action('AuthController@home') }}">ホーム</a></p>
  </x-block>
@endsection