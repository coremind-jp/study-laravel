@extends('layouts.base')
@section('title', 'Fallback Example')

@section('main')
  @component('components.block', ['about' => 'Route::fallback'])
    <p>リクエストしたページは見つかりませんでした。</p>
    <p>Route::fallbackはgroup毎に設定できます。</p>
    <p>このフォールバックは <b>{{ $from }}</b> グループによって呼び出されました。</p>
  @endcomponent
@endsection