@extends('layouts.base')

@section('title', 'Multi Event Dispatch Example')

@push('scripts')
@endpush

@section('main')
  <x-block about="イベント発行">
    <p>
      このページにアクセスするとLaravel内でイベントが発生します。<br>
      EventServiceProvider::$subscribe に subscribe メソッドを実装したクラスを渡すと<br>
      そのクラス内をスコープとしたイベントのリッスンが有効になります。
    </p>
    @if($recieved)
      <p>リスナがリクエストに追加したパラメータは「{{ $recieved }}」です。</p>
    @else
      <p>イベントのリッスンに失敗しました。</p>
    @endif
  </x-block>
@endsection