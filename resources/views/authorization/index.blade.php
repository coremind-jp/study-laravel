@extends('layouts.base')

@section('title', 'Authorization Example')

@section('main')
  <x-block about="ゲート認可">
    <p>
      ゲートによる認可はアクション内の処理について、
      その実行可否をハンドリングするフックを定義できる機能です。
      <br>
      ファサードも定義されているので、blade 構文でも使用可能です。
    </p>
    
    <ul>
      <li>
        <a href="{{ action('AuthorizationController@doSomthingAsAdmin') }} ">要管理者権限をフックしたエンドポイント</a>
        @can('admin-only', Users::class)
          <small class="text-info">：実行可能</small>
        @endcan
        @cannot('admin-only', Users::class)
          <small class="text-danger">：権限がないため実行できません。</small>
        @endcannot
      </li>

      <li>
        <a href="{{ action('AuthorizationController@doSomthingAsChief') }} ">要チーフ権限をフックしたエンドポイント</a>
        @can('chief-higher', Users::class)
          <small class="text-info">：実行可能</small>
        @endcan
        @cannot('chief-higher', Users::class)
          <small class="text-danger">：権限がないため実行できません。</small>
        @endcannot
      </li>

      <li>
        <a href="{{ action('AuthorizationController@doSomthingAsUser') }} ">要登録者権限をフックしたエンドポイント</a>
        @can('user-higher', Users::class)
          <small class="text-info">：実行可能</small>
        @endcan
        @cannot('user-higher', Users::class)
          <small class="text-danger">：権限がないため実行できません。</small>
        @endcannot
      </li>
    </ul>

    @error('authorization')
      <div class="form-group">
        <small class="form-text text-danger">{{ $message }}</small>
      </div>
    @enderror
    <p><a href="{{ action('AuthController@home') }}">ホーム</a></p>
  </x-block>
@endsection