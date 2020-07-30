@extends('layouts.base')
@section('title', 'Route Example')

@section('main')
  @component('components.block', ['about' => 'ルートパラメータの取得'])
    <ul>
      @foreach($params as $key => $value)
        <li>{{ $key }}: {{ $value }}</li>
      @endforeach
    </ul>

    <ol>
      <li><a href="/study/routes/parameters/100">必須パラメータ</a></li>
      <li><a href="/study/routes/parameters/200/option_1">必須パラメータ + 任意パラメータ</a></li>
      <li><a href="/study/routes/parameters/300/option_2/A334">必須パラメータ + 任意パラメータ + 制約パラメータ</a></li>
      <li><a href="/study/routes/parameters/400/option_3/A002/global567895">必須パラメータ + 任意パラメータ + 制約パラメータ + グローバル制約パラメータ</a></li>
      <li><a href="/study/routes/parameters/500/option_4/A566/global978757/a/b/c/d">必須パラメータ + 任意パラメータ + 制約パラメータ + グローバル制約パラメータ + 可変長パラメータ</a></li>
    </ol>
  @endcomponent
@endsection
