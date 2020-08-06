@extends('layouts.base')

@section('title', 'Login Example')

@section('main')
  <x-block about="ログイン認証">
    <form method="POST" action="{{ action('Auth\LoginController@login') }}">
      @csrf
      <div class="form-group">
        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        
        @error('email')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="パスワード">
        <p><a href="{{ route('password.request') }}">パスワードを忘れた場合</a></p>
        
        @error('password')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group form-check">
        <input class="form-check-input" type="checkbox" name="remenber"
          @if(old('remenber', ''))) checked @endif
        >
        <label class="form-check-label">ログイン状態を保存する</label>
      </div>

      @error('authenticate')
        <div class="form-group">
          <small class="form-text text-danger">{{ $message }}</small>
        </div>
      @enderror

      <button type="submit" class="btn btn-primary">ログイン</button>
    </form>
    <a class="btn btn-primary" href="{{ action('Auth\RegisterController@showRegistrationForm') }} ">新規登録</a>
  </x-block>
@endsection