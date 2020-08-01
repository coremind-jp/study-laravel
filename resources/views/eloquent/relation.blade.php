@extends('layouts.base')
@section('title', 'Eloquent(Relation) Example')

@section('main')
  @component('components.block', ['about' => 'Relation'])
    @foreach($relation as $record)
      @component('components.book', ['records' => [$record]])@endcomponent

      <p>この書籍に対するレビュー</p>
      <ul>
        @foreach ($record->reviews as $review)
            <li>{{ $review->body }} ({{ $review->name }})</li>
        @endforeach
      </ul>
    @endforeach
  @endcomponent
@endsection
