@extends('layouts.base')
@section('title', 'Eloquent(Insert) Example')

@section('main')
  @component('components.block', ['about' => 'データベースへの登録'])
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
        <input class="form-control" name="published" value="{{ old('published', $old['published']) }}" placeholder="刊行日"">
        
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
