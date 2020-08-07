@extends('layouts.base')

@section('title', 'Private broadcast with PUSHER Example')

@push('scripts')
  <script src="{{ url('/js/private_broadcast.js') }} "></script>
@endpush

@section('main')
  <x-block about="APIトークンの更新">
    <p>新しいトークンは {{ $token }} です。</p>
    <a href="{{ action('AuthController@home') }}">ホーム</a>
  </x-block>
@endsection