@extends('layouts.base')
@section('title', 'Middleware Example')

@section('main')

  @component('components.block', ['about' => 'middlewareの追加'])
    <p>{{ $msg }}</p>
  @endcomponent

  @component('components.block', ['about' => 'アクションの前処理'])
    <p>書き込み履歴</p>
    <pre>{{ $tail }}</pre>
  @endcomponent

  @component('components.block', ['about' => 'アクションの後処理'])
    <p>blade.php ファイル上で記述されている以下の文字列を書き換えます。</p>
    <p>replace me</p>
  @endcomponent

@endsection
