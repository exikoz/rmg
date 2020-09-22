@extends('layouts.app')
@section('content')

    <h1 class="text-center my-5">Inkommande Förfrågningar</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Artikel</th>
                <th scope="col">Namn</th>
                <th scope="col">Från</th>
                <th scope="col">Till</th>
                <th scope="col">Pris</th>
                <th scope="col">Acceptera</th>
                <th scope="col">Avböj</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($rents as $rent)

                <tr>
                  <th scope="row">{{ $rent->article->title }}</th>
                  <td>{{ $rent->user->name }}</td>
                  <td>{{ $rent->from }}</td>
                  <td>{{ $rent->to }}</td>
                  <td>{{ $rent->article->price }}kr</td>
                  @if ($rent->article->deleted == 0)
                  <td><a href="/accept/{{ $rent->id }}" class="btn btn-success">Acceptera</a></td>
                  <td><a href="/reject/{{ $rent->id }}" class="btn btn-danger">Avböj</a></td>
                  @else
                  <td>Du har raderat artikeln</td>
                  <td></td>
                  @endif
                </tr>

                @endforeach
            </tbody>
          </table>
    </div>


@endsection
