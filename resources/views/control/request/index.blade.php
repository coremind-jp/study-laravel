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


  @component('components.block', ['about' => 'Form'])
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Text</label>
        <input class="form-control" name="name" placeholder="Enter your name">
      </div>
      
      <div class="form-group">
        <label>Checkbox</label>
        <br>
        @for($i = 1; $i <= 5; $i++)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="checkbox[]" value="{{ $i }}">
            <label class="form-check-label">{{ $i }}</label>
          </div>
        @endfor
      </div>

      <div class="form-group">
        <label>Radiobutton</label>
        <br>
        @for($i = 1; $i <= 5; $i++)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radio" value="{{ $i }}">
            <label class="form-check-label">{{ $i }}</label>
          </div>
        @endfor
      </div>

      <div class="form-group">
        <label>Select</label>
        <select class="form-control" name="select">
          <option value="0"></option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

      <div class="form-group">
        <label>File upload</label>
        <input type="file" class="form-control-file" name="upload">
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  @endcomponent


  @component('components.block', ['about' => 'Form Result'])
    @isset($name)
      <p>Hi, {{ $name }}.</p>
    @endisset

    @if($checkbox)
      <p>Checkbox's value ({{ $checkbox }}) was checked.</p>
    @endif

    @if($radio)
      <p>Radiobutton's value was {{ $radio }}.</p>
    @endif
    
    @if($select)
      <p>Select's value was {{ $select }}.</p>
    @endif

    @if($file)
      <label>Upload file infomation.</label>
      <ul>
        @foreach($file as $key => $value)
          <li>{{ $key }}: <b>{{ $value }}</b></li>
        @endforeach
      </ul>
    @endif
  @endcomponent
@endsection
