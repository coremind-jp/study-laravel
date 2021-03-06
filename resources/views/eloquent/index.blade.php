@extends('layouts.base')
@section('title', 'Eloquent(Query) Example')

@section('main')
  @component('components.block', ['about' => 'Table::all'])
    <code>Book::all()</code>
    @component('components.book', ['records' => $all])@endcomponent
  @endcomponent


  @component('components.block', ['about' => 'Table::find'])
    <code>Book::find(1)->title</code>
    <p>{{ $find }}</p>
  @endcomponent


  @component('components.block', ['about' => 'Aggregate'])
    <code>Book::where('publisher', '翔泳社')->max('price')</code>
    <p>{{ $max }}</p>
  @endcomponent


  @component('components.block', ['about' => 'Table::select'])
    <code>Book::select('title', 'publisher')->get()</code>
    <table class="table table-striped">
      <tr>
        <th>書名</th>
        <th>出版社</th>
      </tr>
      @foreach($select as $record)
        <tr>
          <td>{{ $record->title }}</td>
          <td>{{ $record->publisher }}</td>
        </tr>
      @endforeach
    </table>
  @endcomponent


  @component('components.block', ['about' => 'Table::where'])
    @foreach($where as $where_example)
      <code>{{ $where_example['query'] }}</code>
      @component('components.book', ['records' => $where_example['records']])@endcomponent
    @endforeach
  @endcomponent


  @component('components.block', ['about' => 'Table::orderBy'])
    @foreach($orderby as $orderby_example)
      <code>{{ $orderby_example['query'] }}</code>
      @component('components.book', ['records' => $orderby_example['records']])@endcomponent
    @endforeach
  @endcomponent
  

  @component('components.block', ['about' => 'Table::groupBy'])
    <code>Book::groupBy('publisher')->selectRaw('publisher, AVG(price) AS price_avg')->get()</code>
    <table class="table table-striped">
      <tr>
        <th>出版社</th>
        <th>平均価格</th>
      </tr>
      @foreach($groupby_a as $record)
        <tr>
          <td>{{ $record->publisher }}</td>
          <td>{{ floor($record->price_avg) }}</td>
        </tr>
      @endforeach
    </table>
    
    <code>Book::groupBy('publisher')->having('price_avg', '<', 2500)->selectRaw('publisher, AVG(price) AS price_avg')->get()</code>
    <table class="table table-striped">
      <tr>
        <th>出版社</th>
        <th>平均価格</th>
      </tr>
      @foreach($groupby_b as $record)
        <tr>
          <td>{{ $record->publisher }}</td>
          <td>{{ floor($record->price_avg) }}</td>
        </tr>
      @endforeach
    </table>
  @endcomponent
@endsection
