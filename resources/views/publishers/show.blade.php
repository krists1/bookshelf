@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-link" href="{{ route('publishers.index') }}">< Atpakaļ</a>
        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h1 class="card-title">{{ $publisher->name ?? ''}}</h1>
                </li>
                <li class="list-group-item">
                    <p class="card-title">Dibināšanas gads: <b>{{ $publisher->founded }}</b></p>
                </li>
                <li class="list-group-item">
                    <p class="card-title">Valsts: <b>{{ $publisher->country }}</b></p>
                </li>
                <li class="list-group-item">
                    <p class="card-text">Aktīvs:  {{ $publisher->active ? 'Jā' : 'Nē' }}</p>
                </li>
            </ul>
    </div>
@endsection
