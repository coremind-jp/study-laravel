@extends('layouts.base')
@section('title', 'Model Management With Policy Example')

@section('main')
  @component('components.block', ['about' => 'ポリシー認可を利用したモデル操作'])
    <p>このページに利用されているモデルに対する操作はポリシー認可を利用しています。</p>

    <ul>
      <li>
        追加（コントローラーでのポリシー適用）
        @can('chief-higher', Users::class)
          <small class="text-info">：実行可能</small>
        @else
          <small class="text-danger">：権限がないため実行できません。</small>
        @endcannot        
      </li>

      <li>
        更新（ミドルウェアでのポリシー適用）
        @can('chief-higher', Users::class)
          <small class="text-info">：実行可能</small>
        @else
          <small class="text-danger">：権限がないため実行できません。</small>
        @endcannot        
      </li>

      <li>
        削除（ユーザーモデルを利用したポリシー適用）
        @can('admin-only', Users::class)
          <small class="text-info">：実行可能</small>
        @endcan
        @cannot('admin-only', Users::class)
          <small class="text-danger">：権限がないため実行できません。</small>
        @endcannot        
      </li>
    </ul>

    <p><a href="{{ action('AuthController@home') }}">ホーム</a></p>

    <form method="POST" action="{{ $action }}">
      @csrf
      @method($method)

      <div class="form-group">
        <input class="form-control" name="isbn" value="{{ old('isbn', $old['isbn']) }}" placeholder="ISBNコード">
        
        @error('isbn')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" name="title" value="{{ old('title', $old['title']) }}" placeholder="書名">
        
        @error('title')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" name="price" value="{{ old('price', $old['price']) }}" placeholder="価格">
        
        @error('price')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" name="publisher" value="{{ old('publisher', $old['publisher']) }}" placeholder="出版社">
        
        @error('publisher')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <input class="form-control" name="published" value="{{ old('published', $old['published']) }}" placeholder="刊行日">
        
        @error('published')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
      
      <button type="submit" class="btn btn-primary">登録</button>
    </form>
  @endcomponent

  @component('components.block', ['about' => '登録されている書籍 (直近 5 件)'])
    @component('components.book', ['records' => $history, 'patch' => true])@endcomponent
  @endcomponent
@endsection
