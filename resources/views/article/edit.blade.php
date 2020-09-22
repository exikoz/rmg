@extends('layouts.app')
@section('content')

    <h1 class="text-center my-5">Redigera annons</h1>
    <form method="POST" action="/articles/{{ $article->id }}">

        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="title">Rubrik</label>
          <input name="title" type="text" class="form-control" value="{{ $article->title }}">

          @error('title')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror

        </div>
        <div class="form-group">
          <label for="price">Pris</label>
        <input name="price" type="text" class="form-control" value="{{ $article->price }}">

          @error('price')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror

        </div>
        <div class="form-group">
            <label for="description">Beskrivning</label>
        <textarea name="description" class="form-control">{{ $article->description }}</textarea>

          @error('description')
            <small class="form-text text-danger">{{ $message }}</small>
          @enderror

          </div>
        <button type="submit" class="btn btn-warning btn-block">Ändra</button>
      </form>

@endsection
