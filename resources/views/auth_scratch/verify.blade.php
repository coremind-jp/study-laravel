@extends('layouts.base')

@section('title', 'Login Example')

@section('main')
  <x-block about="認証確認メール送信">
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        登録したメールアドレス宛に確認メールを送信しました。
    </div>
    @else
      <p>続行する前に、メールに記載された確認リンクで認証を済ませる必要があります。</p>

      メールが届かない場合は、
      <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            こちら
          </button>
      </form>
      からメールの再送ができます。
    @endif
  </x-block>
@endsection