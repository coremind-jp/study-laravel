@extends('layouts.base')
@section('title', 'SignedURL Example')

@section('main')
  @component('components.block', ['about' => '署名付きURLの生成'])
    <p><a href="{{ $signed }}">署名URL</a></p>
    <p><a href="{{ $temporary }}">時限付き署名URL({{ $timeleft }}分で無効)</a></p>
  @endcomponent
@endsection