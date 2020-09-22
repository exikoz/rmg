@extends('layouts.app')
@section('content')

    <h1 class="text-center my-5">Avböjda</h1>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
              <tr class="thead-dark">
                <th scope="col">Artikel</th>
                <th scope="col">Hyrare</th>
                <th scope="col">Från</th>
                <th scope="col">Till</th>
                <th scope="col">Pris</th>
                <th scope="col">Avböjd</th>
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

                  @if ($rent->accepted == 0 && $rent->rejected == 1)
                  <td class="text-danger" >Avböjd</td>
                  @else
                  <td>  </td>
                  @endif

                </tr>
                @endforeach
            </tbody>
          </table>
    </div>


@endsection
