@extends('layouts.base')

@section('title', $access.' broadcast with PUSHER Example')

@push('metas')
  <meta name="api-token" content="{{ $token }}">
@endpush

@push('scripts')
  <script src="{{ url('/js/'.$access.'_broadcast.js') }} "></script>
@endpush

@section('main')
  <x-block about="PUSHERを利用した{{ $name }}ブロードキャスト送信">
    <div class="form-group">
      <button id="join" class="btn btn-primary" >チャンネル入室</button>
      <button id="leave" class="btn btn-danger" disabled>チャンネル退室</button>
    </div>

    <div class="form-group">
      <input id="message" class="form-control" name="message" placeholder="メッセージ" readonly>
      <small id="error" class="form-text text-danger"></small>
    </div>

    <button id="submit" type="submit" class="btn btn-primary" disabled>ブロードキャスト送信</button>
    <a href="{{ action('AuthController@home') }}">ホーム</a>
  </x-block>

  <x-block about="PUSHERを利用した{{ $name }}ブロードキャスト受信">
    <div id="recieved">
    </div>
  </x-block>
@endsection