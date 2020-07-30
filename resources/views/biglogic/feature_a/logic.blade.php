@extends('layouts.base')
@section('title', 'Root namespace Example')

@section('main')
  @component('components.block', ['about' => 'Route::namespace'])
    <h3>Feature A</h3>
    <p>このルーティングはnamespaceでコントローラーを束ねられています。</p>
  @endcomponent
@endsection