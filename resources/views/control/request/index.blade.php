@extends('layouts.base')
@section('title', 'Request Example')

@section('main')
  @component('components.block', ['about' => 'Parse Request Object'])
    <ul>
      @foreach($dump as $key => $value)
        <li>{{ $key }}: <b>{{ $value }}</b></li>
      @endforeach
    </ul>

  @endcomponent

@endsection
