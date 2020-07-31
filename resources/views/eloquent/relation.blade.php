@extends('layouts.base')
@section('title', 'Eloquent(Relation) Example')

@section('main')

  @component('components.block', ['about' => 'Relation'])
    @foreach($relation as $record)
      <table class="table">
        <tr>
          <th>書名</th>
          <th>価格</th>
          <th>出版社</th>
          <th>刊行日</th>
        </tr>
        <tr>
          <td>{{ $record->title }}</td>
          <td>{{ $record->price }}</td>
          <td>{{ $record->publisher }}</td>
          <td>{{ $record->published }}</td>
        </tr>
      </table>

      <p>この書籍に対するレビュー</p>
      <ul>
        @foreach ($record->reviews as $review)
            <li>{{ $review->body }} ({{ $review->name }})</li>
        @endforeach
      </ul>
    @endforeach
  @endcomponent

@endsection
