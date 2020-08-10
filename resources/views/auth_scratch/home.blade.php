@extends('layouts.base')

@section('title', 'Home Example')

@section('main')
  <x-block about="ホーム画面">
    <p>ようこそ、{{ $name }}さん。</p>
    <p><a class="btn btn-primary" href="{{ action('AuthController@pay') }} ">支払実行（仮）</a></p>
    <ul>
      <li><a href="{{ action('AuthorizationController@index') }} ">ゲート認可</a></li>
      <li><a href="{{ action('MailController@html') }} ">メール送信(HTML)</a></li>
      <li><a href="{{ action('MailController@markdown') }} ">メール送信(Markdown)</a></li>
      <li><a href="{{ route('books') }} ">ポリシー認可を利用したモデル操作</a></li>
      <li><a href="{{ action('BroadcastController@private', ['id' => $id]) }} ">プライベートブロードキャスト</a></li>
      <li><a href="{{ action('AuthController@profile') }} ">プロフィール</a></li>
      <li><a href="{{ action('AuthController@updateTokne') }} ">APIトークンの更新</a></li>
      <li><a href="{{ route('password.update') }} ">パスワードリセット</a></li>
    </ul>
    <form method="POST" action="{{ action('Auth\LoginController@logout') }}">
      @csrf
      <button type="submit" class="btn btn-primary">ログアウト</button>
    </form>
  </x-block>
@endsection