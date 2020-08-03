@extends('layouts.base')
@section('title', 'Custom Validation Example')

@section('main')
  @component('components.block', ['about' => 'カスタムバリデーション'])
      <form name="rule" method="POST" action={{ action('CustomValidationController@rule') }}>
        @csrf
        <div class="form-group">
          <input class="form-control" name="form_rule" value="" placeholder="available value is 'rule' only">
          
          @error('form_rule')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ruleで検査</button>
      </form>

      <hr>

      <form name="extend" method="POST" action={{ action('CustomValidationController@extend') }}>
        @csrf
        <div class="form-group">
          <input class="form-control" name="form_extend" value="" placeholder="available value is 'extend' only">
          
          @error('form_extend')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">extendで検査</button>
      </form>

      <hr>

      <form name="closure" method="POST" action={{ action('CustomValidationController@closure') }}>
        @csrf
        <div class="form-group">
          <input class="form-control" name="form_closure" value="" placeholder="available value is 'closure' only">
          
          @error('form_closure')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Closureで検査</button>
      </form>
  @endcomponent
@endsection