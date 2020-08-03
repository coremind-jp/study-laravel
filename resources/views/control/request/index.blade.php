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
    <form method="POST" action="{{ action('Control\\RequestController@post') }}" enctype="multipart/form-data">
      <div class="form-group">
        <label>Text</label>

        <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter your name">
        
        @error('name')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>
      
      <div class="form-group">
        <label>Checkbox</label><br>

        @for($i = 1; $i <= 5; $i++)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="checkbox[]" value="{{ $i }}"
              @if(in_array($i, old('checkbox', []))) checked @endif
            >
            <label class="form-check-label">{{ $i }}</label>
          </div>
        @endfor

        @error('checkbox')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label>Radiobutton</label><br>

        @for($i = 1; $i <= 5; $i++)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radio" value="{{ $i }}"
              @if($i == old('radio'))) checked @endif
            >
            <label class="form-check-label">{{ $i }}</label>
          </div>
        @endfor

        @error('radio')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label>Select</label>

        <select class="form-control" name="select">
          <option value=""></option>
          @for($i = 1; $i <= 5; $i++)
            <option @if($i == old('select')) selected @endif>{{ $i }}</option>
          @endfor
        </select>

        @error('select')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group">
        <label>File upload</label>

        <input type="file" class="form-control-file" name="upload" value="{{ old('upload') }}">

        @error('upload')
          <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      @csrf
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  @endcomponent


  @if($validated)
    @component('components.block', ['about' => 'Form Result'])
      <p>Hi, {{ $name }}.</p>

      <p>Checkbox's value(s) ({{ $checkbox }}) was checked.</p>

      <p>Radiobutton's value was {{ $radio }}.</p>
      
      <p>Select's value was {{ $select }}.</p>

      <label>Uploaded file infomation.</label>
      <ul>
        @foreach($upload as $key => $value)
          <li>{{ $key }}: <b>{{ $value }}</b></li>
        @endforeach
      </ul>
    @endcomponent
  @endif
@endsection
