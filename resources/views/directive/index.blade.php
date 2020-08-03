@extends('layouts.base')
@section('title', 'Directive Example')

@section('main')

  @component('components.block', ['about' => '&#123;&#123;&#125;&#125;内はコードとして評価できる'])
    <p>現在の日時: {{ date('Y年m月d日 h:i:s') }}</p>
  @endcomponent


  @component('components.block', ['about' => '&#123;&#123;&#125;&#125;内は暗黙的にエスケープされる'])
    <p>{{ $img }}</p>
    <br>
  @endcomponent


  @component('components.block', ['about' => '&#123;&#123;&#125;&#125;内のエスケープ処理をさせない'])
    <p>{!! $img !!}</p>
  @endcomponent


  @component('components.block', ['about' => '&#123;&#123;&#125;&#125;を文字列として評価'])
    <p>@{{ $img }}</p>
  @endcomponent


  @component('components.block', ['about' => '@component'])
    @component('components.alert', ['type' => 'success'])
      @slot('alert_title')
        はじめてのコンポーネント
      @endslot

      コンポーネントにはスロットの概念があります。
      この文章はスロットによって出力されました！ 
    @endcomponent
  @endcomponent


  @component('components.block', ['about' => '@include'])
    @include('subviews.alert', [
      'type' => 'warning',
      'alert_title' => 'はじめてのサブビュー',
      'context' => 'メインテンプレ―トに渡された変数はサブビュー内でも利用できます！',
    ])
  @endcomponent


  @component('components.block', ['about' => '@each'])
    <table class="table table-striped">
      <tr>
        <th>ISBN</th>
        <th>書名</th>
        <th>価格</th>
        <th>出版社</th>
        <th>刊行日</th>
      </tr>
      @each('components.book.item', $foreach, 'record', 'components.book.book_empty')
    </table>
  @endcomponent


  @component('components.block', ['about' => '@if/elseif/else'])
    @if ($random < 50)
      <p>{{ $random }}は50未満です。</p>
    @elseif ($random < 70)
      <p>{{ $random }}は70未満です。</p>
    @else
      <p>{{ $random }}は70以上です。</p>
    @endif
  @endcomponent


  @component('components.block', ['about' => '@unless'])
    @unless(30 <= $random && $random <= 60)
      <p>{{ $random }}は30-60の範囲外です。</p>
    @endunless
  @endcomponent


  @component('components.block', ['about' => '@empty'])
    @empty($empty)
      <p>メッセージはありません！</p>
    @endempty
  @endcomponent


  @component('components.block', ['about' => '@isset'])
    @isset($isset)
      <p>変数isset は {{ $isset }}です。</p>
    @else
      <p>メッセージはありません！</p>
    @endisset
  @endcomponent


  @component('components.block', ['about' => '@switch'])
    @switch($switch)
      @case(5)
        <p>大ラッキーの壱日です！</p>
        @break

      @case(4)
        <p>ちょっぴり良いことがあるかも？</p>
        @break

      @case(3)
        <p>ふつーの壱日。</p>
        @break

      @case(2)
        <p>今日は静かに過ごしましょう…</p>
        @break

      @default
        <p>umm…</p>
    @endswitch
  @endcomponent


  @component('components.block', ['about' => '＠php and @while'])
    @php
      $i = 1;
    @endphp

    @while($i <= 6)  
      <h{{$i}}>[while] {{$i}}番目です。</h{{$i}}>

      @php
        $i++;
      @endphp

    @endwhile
  @endcomponent


  @component('components.block', ['about' => '@for'])
    @for ($i = 1; $i <= 6; $i++)
      <h{{$i}}>[for] {{$i}}番目です。</h{{$i}}>
    @endfor
  @endcomponent


  @component('components.block', ['about' => '@foreach (index)'])
    <table class="table table-striped">
      <tr>
        <th>No.</th>
        <th>書名</th>
        <th>価格</th>
        <th>出版社</th>
        <th>刊行日</th>
      </tr>
      @foreach ($foreach as $id => $record)
        <tr>
          <td>{{ $id+1 }}</td>
          <td>{{ $record->title }}</td>
          <td>{{ $record->price }}</td>
          <td>{{ $record->publisher }}</td>
          <td>{{ $record->published }}</td>
        </tr>
      @endforeach
    </table>
  @endcomponent


  @component('components.block', ['about' => '@foreach (key)'])
    <table class="table table-striped">
      <ul>
        @foreach ($foreach_key as $key => $value)
          <li>{{ $key }}: {{ $value }}</li>
        @endforeach
      </ul>
    </table>
  @endcomponent


  @component('components.block', ['about' => '@forelse'])
    <table class="table table-striped">
      <tr>
        <th>some</th>
        <th>array</th>
        <th>template</th>
      </tr>
      @forelse ([] as $empty)
      <tr>
        <td>this</td>
        <td>element</td>
        <td>invisible</td>
      </tr>
      @empty
      <tr>
        <td colspan="3" style="text-align: center;">データは存在しません。</td>
      </tr>
      @endforelse
    </table>
  @endcomponent


  @component('components.block', ['about' => '$loop'])
    <table class="table table-striped">
      <tr>
        <th>値</th>
        <th>index</th>
        <th>iteration</th>
        <th>count</th>
        <th>first</th>
        <th>last</th>
        <th>even</th>
        <th>odd</th>
        <th>depth</th>
      </tr>
      @foreach ($weeks as $week)
        <tr>
          <td>{{ $week }}</td>
          <td>{{ $loop->index }}</td>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $loop->count }}</td>
          <td>{{ $loop->first }}</td>
          <td>{{ $loop->last }}</td>
          <td>{{ $loop->even }}</td>
          <td>{{ $loop->odd }}</td>
          <td>{{ $loop->depth }}</td>
        </tr>
      @endforeach
    </table>
  @endcomponent


  @component('components.block', ['about' => '@break'])
    <table class="table table-striped">
      <tr>
        <th>値</th>
        <th>index</th>
        <th>iteration</th>
        <th>count</th>
        <th>first</th>
        <th>last</th>
        <th>even</th>
        <th>odd</th>
        <th>depth</th>
      </tr>
      @foreach ($weeks as $week)
        @break($loop->iteration > 3)
        <tr>
          <td>{{ $week }}</td>
          <td>{{ $loop->index }}</td>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $loop->count }}</td>
          <td>{{ $loop->first }}</td>
          <td>{{ $loop->last }}</td>
          <td>{{ $loop->even }}</td>
          <td>{{ $loop->odd }}</td>
          <td>{{ $loop->depth }}</td>
        </tr>
      @endforeach
    </table>
  @endcomponent


  @component('components.block', ['about' => '@continue'])
    <table class="table table-striped">
      <tr>
        <th>値</th>
        <th>index</th>
        <th>iteration</th>
        <th>count</th>
        <th>first</th>
        <th>last</th>
        <th>even</th>
        <th>odd</th>
        <th>depth</th>
      </tr>
      @foreach ($weeks as $week)
        @continue($loop->odd)
        <tr>
          <td>{{ $week }}</td>
          <td>{{ $loop->index }}</td>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $loop->count }}</td>
          <td>{{ $loop->first }}</td>
          <td>{{ $loop->last }}</td>
          <td>{{ $loop->even }}</td>
          <td>{{ $loop->odd }}</td>
          <td>{{ $loop->depth }}</td>
        </tr>
      @endforeach
    </table>
  @endcomponent

@endsection