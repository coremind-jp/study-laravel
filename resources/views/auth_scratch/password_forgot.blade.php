@extends('layouts.base')

@section('title', 'Password Reset Example')

@section('main')
  <x-block about="パスワードリセット">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="form-group">
        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        
        @error('email')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">パスワードリセットメールの送信</button>
    </form>
  </x-block>
@endsection
