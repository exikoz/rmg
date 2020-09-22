@extends('layouts.app')
@section('content')

    <h1 class="text-center my-5">Annons</h1>
    <div class="d-flex flex-row row">

        <div class="col d-flex align-items-stretch mt-3">
            <div class="card mx-2 h-100 flex-fill">
                <div class="card-body d-flex flex-column">
                    <h4 class="card-title">{{ $article->title }}</h4>
                    <p class="card-text">{{ $article->description }}</p>
                    <h5 class="card-subtitle mb-2 text-success">{{ $article->price }}kr</h5>
                    <p class="font-italic">Av {{ $article->user->name }}</p>

                    @if ($article->user_id === auth()->id())
                    <a href="/articles/{{ $article->id }}/edit" class="btn btn-warning btn-block">Redigera</a>
                    <a href="/deleted/{{ $article->id }}" type="button" class="btn btn-danger btn-block">
                        Radera
                      </a>
                    @endif

                    @if ($article->user_id !== auth()->id())
                    <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal">
                        Hyr
                      </button>
                    @endif


                    <!-- Modal -->
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle">Hyr</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form method="POST" action="/request/{{ $article->id }}">
                                        @csrf
                                        <div class="form-group">

                                            <label for="from">Från:</label>
                                            <input type="date" name="from">
                                            @error('from')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror

                                            <label for="to">Till:</label>
                                            <input type="date" name="to">
                                            @error('to')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                            <button type="submit" class="btn btn-success btn-block">Hyr</button>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-danger btn-block" data-dismiss="modal">Stäng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
