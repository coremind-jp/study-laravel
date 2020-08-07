@extends('layouts.base')

@section('title', 'Private broadcast with PUSHER Example')

@push('metas')
  <meta name="api-token" content="{{ $token }}">
@endpush

@push('scripts')
  <script src="{{ url('/js/private_broadcast.js') }} "></script>
@endpush

@section('main')
  <x-block about="PUSHERを利用したプライベートブロードキャスト送信">
    <div class="form-group">
      <input id="message" class="form-control" name="message" placeholder="メッセージ">
      <small id="error" class="form-text text-danger"></small>
    </div>

    <button id="submit" type="submit" class="btn btn-primary">ブロードキャスト送信</button>
  </x-block>

  <x-block about="PUSHERを利用したプライベートブロードキャスト受信">
    <div id="recieved">
    </div>
  </x-block>
@endsection