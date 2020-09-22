@extends('layouts.app')
@section('content')

    <h1 class="text-center my-5">Skapa en ny annons</h1>
    <form method="POST" action="/articles">

        @csrf

        <div class="form-group">
          <label for="title">Rubrik</label>
          <input name="title" type="text" class="form-control" value="{{ old('title') }}">

          @error('title')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror

        </div>
        <div class="form-group">
          <label for="price">Pris</label>
          <input name="price" type="text" class="form-control" value="{{ old('price') }}">

          @error('price')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror

        </div>
        <div class="form-group">
            <label for="description">Beskrivning</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>

          @error('description')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror

          </div>
        <button type="submit" class="btn btn-success btn-block">Lägg upp annons!</button>
      </form>

@endsection
