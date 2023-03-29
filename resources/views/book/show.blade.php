@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-link" href="{{ route('book.index') }}">< Atpakaļ</a>
        </div>
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

@endsection
