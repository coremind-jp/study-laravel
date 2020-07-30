@extends('layouts.base')
@section('title', 'Response Example')

@section('main')
  @component('components.block', ['about' => 'Response'])

    <p><a href="./plain">プレーンテキストを返す</a></p>
    <p><a href="./json">JSONを返す</a></p>
    <p><a href="./download">ファイルをダウンロードさせる</a></p>
    <p><a href="./file">画像を表示させる</a></p>
    <p><a href="./request_redirect/path">パス指定でのリダイレクト実行</a></p>
    <p><a href="./request_redirect/route">route名指定でのリダイレクト実行</a></p>
    <p><a href="./request_redirect/route_with_param">route名指定でのリダイレクト実行（パラメータ付き）</a></p>
    <p><a href="./request_redirect/away">外部サイトへジャンプ</a></p>
  @endcomponent

@endsection
