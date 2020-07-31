@extends('layouts.base')
@section('title', 'Stateful Example')

@section('main')

  @component('components.block', ['about' => '暗号化クッキーの読み書きと削除'])
    @isset($encrypt)
        <p>保存されている値: <b>{{ $encrypt }}</b></p>
    @else
        <p><a href="./stateful/write_cookie/encrypt">時刻を書き込む</a></p>
    @endisset
    <p><a href="./stateful/clear_cookie/encrypt">値を削除</a></p>
  @endcomponent

  @component('components.block', ['about' => 'プレーンクッキーの読み書きと削除'])
    @isset($plain)
        <p>保存されている値: <b>{{ $plain }}</b></p>
    @else
        <p><a href="./stateful/write_cookie/plain">時刻を書き込む</a></p>
    @endisset
    <p><a href="./stateful/clear_cookie/plain">値を削除</a></p>
  @endcomponent

  @component('components.block', ['about' => 'セッション（file driver）の読み書きと削除'])
    @isset($session_value)
        <p>保存されている値: <b>{{ $session_value }}</b></p>
    @else
        <p><a href="./stateful/write_session">時刻を書き込む</a></p>
    @endisset
    <p><a href="./stateful/clear_session">値を削除</a></p>
  @endcomponent

@endsection
