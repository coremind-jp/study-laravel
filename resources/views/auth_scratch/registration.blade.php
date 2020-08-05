@extends('layouts.base')

@section('title', 'Login Example')

@section('main')
  <x-block about="ユーザー登録">
    <form method="POST" action="{{ action('Auth\RegisterController@register') }}">
      @csrf

      <div class="form-group">
        <select class="form-control" name="authority">
          <option value="">権限</option>
          @foreach($authorities as $authority)
            <option @if($authority == old('authority')) selected @endif>{{ $authority }}</option>
          @endforeach
        </select>

        @error('authority')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" type="name" name="name" value="{{ old('name') }}" placeholder="名前">
        
        @error('name')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        
        @error('email')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="パスワード">
        
        @error('password')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="パスワード確認">
      </div>

      <button type="submit" class="btn btn-primary">登録</button>
    </form>
  </x-block>
@endsection