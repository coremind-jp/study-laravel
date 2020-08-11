@extends('layouts.base')

@section('title', 'Notification Dispatch Example')

@section('main')
  <x-block about="通知発行">
    @if($sent)
      <p class="bg-success text-white">通知しました。</p>
    @endif

    <form method="POST" action="{{ action('NotificationController@notify') }}">
      @csrf

      <div class="form-group">
        <input class="form-control" type="title" name="title" value="{{ old('title') }}" placeholder="タイトル">
        
        @error('title')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <p>メッセージ</p>
        <textarea class="form-control" name="message">{{ old('message') }}</textarea>
        
        @error('message')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">通知発行</button>
    </form>

    <p><a href="{{ action('AuthController@home') }}">ホーム</a></p>
  </x-block>

  <x-block about="未読通知一覧">
    <ul>
      @foreach ($unreadNotifications as $notification)
        <li>
          <a href="{{ action('NotificationController@read', ['id' => $notification->id]) }}">{{ $notification->data['message'] }}</a>
        </li>
      @endforeach
    </ul>
  </x-block>

  <x-block about="過去の通知一覧">
    <ul>
      @foreach ($notifications as $notification)
        <li>
          <a href="{{ action('NotificationController@read', ['id' => $notification->id]) }}">{{ $notification->data['message'] }}</a>
        </li>
      @endforeach
    </ul>
  </x-block>
@endsection
