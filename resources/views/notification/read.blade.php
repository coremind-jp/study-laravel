@extends('layouts.base')

@section('title', 'Notification Dispatch Example')

@section('main')
  <x-block about="通知メッセージ確認">
    <p>{{ $title }}(発行者：{{ $name }})</p>
    <p>{{ $message }}</p>
    <p><a href="{{ action('NotificationController@index') }}">戻る</a></p>
  </x-block>
@endsection
