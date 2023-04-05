@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-link" href="{{ route('book.index') }}">< Atpakaļ</a>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h1 class="card-title">{{ $book->title ?? ''}}</h1>
                </li>
                <li class="list-group-item">
                    <p class="card-title">Autors: <b>{{ $book->author->fullName ?? ''}}</b></p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">{{ $book->description ?? ''}}</p>
                </li>
            </ul>
        </div>
    </div>

    <hr/>



    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('review.create') }}?book={{ $book->id }}">Jauna atsauksme</a>
            <h2>Atsauksmes</h2>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">

                @foreach($reviews as $review)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-10">
                                <p><i>{{ $review->user->email }}</i> -- <b>{{ $review->title }}</b></p>
                                <p>{{ $review->text }}</p>
                            </div>
                            <div class="col-md-2 row">
                                <div class="col-md-6">
                                    @can('update', $review)
                                    <a class="btn btn-secondary" href="{{ route('review.edit', $review->id) }}">Labot</a>
                                    @endcan
                                </div>
                                <div class="col-md-6">
                                    @can('delete', $review)
                                    <form method="post" action="{{ route('review.destroy', $review->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Dzēst</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>


@endsection
