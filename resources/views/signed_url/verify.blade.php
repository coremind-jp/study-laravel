@extends('layouts.base')
@section('title', 'SignedURL Example')

@section('main')
  @component('components.block', ['about' => '署名付きURLの検証'])
    <p>署名検証に成功したためこのページを表示しています。</p>
  @endcomponent
@endsection