@extends('layouts.base')

@section('title', 'Password Confirm Example')

@section('main')
  <x-block about="重要な処理の前に改めて認証を挟む">
    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <div class="form-group">
        <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="パスワード">
        
        @error('password')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      @error('authenticate')
        <div class="form-group">
          <small class="form-text text-danger">{{ $message }}</small>
        </div>
      @enderror

      <button type="submit" class="btn btn-primary">支払確定</button>
    </form>
    <a href="{{ action('AuthController@home') }}">ホーム</a>
  </x-block>
@endsection