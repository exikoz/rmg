@extends('layouts.app')
@section('content')

    <h1 class="text-center my-5">Annonser</h1>
    <div class="d-flex flex-row row">
        @forelse ($articles as $article)

            <div class="col-lg-4 d-flex align-items-stretch mt-3">
                <div class="card mx-2 h-100 flex-fill">
                    <div class="card-body d-flex flex-column">

                        <h4 class="card-title">{{ $article->title }}</h4>
                        <p class="card-text">{{ $article->description }}</p>
                        <hr>
                        <div class="mt-auto">

                            <h5 class="card-subtitle mb-2 text-success">{{ $article->price }}kr</h5>
                            <p class="font-italic">Av {{ $article->user->name }}</p>

                            <a href="/articles/{{ $article->id }}" class="btn btn-primary btn-block">Visa</a>

                        </div>
                    </div>
                </div>
            </div>



        @empty
            <h3>Inga artiklar att visa</h3>
        @endforelse
    </div>

@endsection
