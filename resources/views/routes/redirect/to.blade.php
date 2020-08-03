@extends('layouts.base')
@section('title', 'Root Redirect Example')

@section('main')
  @component('components.block', ['about' => 'Route::redirect'])
    <p>リダイレクトによってこのページが表示されています。</p>
  @endcomponent
@endsection