@extends('layouts.base')

@section('title', 'Password Reset Example')

@section('main')
  <x-block about="パスワードの再設定">
    <form method="POST" action="{{ route('password.update') }}">
      @csrf

      <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group">
        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        
        @error('email')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="パスワード">
        
        @error('password')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" type="password" name="password_confirmation" placeholder="パスワード確認">
      </div>

      <button type="submit" class="btn btn-primary">パスワードリセット</button>
    </form>
  </x-block>
@endsection