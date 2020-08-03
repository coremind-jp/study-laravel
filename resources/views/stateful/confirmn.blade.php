@extends('layouts.base')
@section('title', 'Stateful Example')

@section('main')
  @component('components.block', ['about' => 'セッションデータチェック'])
      @if(session('flash_confirmn'))
        <p>フラッシュデータは保持されています。</p>
      @else
        <p>フラッシュデータが見つかりません。</p>
      @endif

      <hr>

      <a href="{{ url(action('StatefulController@flash').'?'.http_build_query (['session' => 'flash'])) }}">
        <p>flashを要求してに遷移</p>
      </a>

      <a href="{{ url(action('StatefulController@flash').'?'.http_build_query (['session' => ''])) }}">
        <p>reflashを要求せずに遷移</p>
      </a>

      <a href="{{ url(action('StatefulController@flash').'?'.http_build_query (['session' => 'reflash'])) }}">
        <p>reflashを要求して遷移</p>
      </a>
  @endcomponent
@endsection