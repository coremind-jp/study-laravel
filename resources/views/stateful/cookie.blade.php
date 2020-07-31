@extends('layouts.base')
@section('title', 'Stateful Example')

@section('main')

  @component('components.block', ['about' => '暗号化クッキーの書込と取得'])
    @isset($encrypt)
        <p>保存されている値: <b>{{ $encrypt }}</b></p>
    @else
        <p><a href="./write_cookie/encrypt">実行時刻を書き込む。</a></p>
    @endisset
  @endcomponent

  @component('components.block', ['about' => 'プレーンクッキーの書込と取得'])
    @isset($plain)
        <p>保存されている値: <b>{{ $plain }}</b></p>
    @else
        <p><a href="./write_cookie/plain">実行時刻を書き込む。</a></p>
    @endisset
  @endcomponent

@endsection
