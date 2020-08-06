@extends('layouts.base')

@section('title', 'Event Dispatch Example')

@push('scripts')
@endpush

@section('main')
  <x-block about="イベント発行">
    <p>
      このページにアクセスするとLaravel内でイベントが発生します。<br>
      EventServiceProvider::$listen にイベントクラスとリスナクラスを渡すことで有効になります。<br>
    </p>

    @if($recieved)
      <p>リスナがリクエストに追加したパラメータは「{{ $recieved }}」です。</p>
    @else
      <p>イベントのリッスンに失敗しました。</p>
    @endif
  </x-block>
@endsection