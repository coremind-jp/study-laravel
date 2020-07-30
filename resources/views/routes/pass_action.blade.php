@extends('layouts.base')
@section('title', 'Root Passes Action Example')

@section('main')
  @component('components.block', ['about' => 'Route::view'])
    <p>このページはコントローラー介して表示されていません。しかし簡単なパラメータを受け取ることができます。</p>
    <p>受け取ったパラメータ: <b>{{ $param }}</b></p>
  @endcomponent
@endsection