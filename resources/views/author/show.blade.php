@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="d-inline">{{ $author->full_name ?? ''}}</h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">Vārds</div>
                <div class="col-sm-10 border-left">{{ $author->name ?? ''}}</div>
            </div>

            <div class="row">
                <div class="col-sm-2">Uzvārds</div>
                <div class="col-sm-10 border-left">{{ $author->surname ?? ''}}</div>
            </div>

            <div class="row">
                <div class="col-sm-2">Nacionalitāte</div>
                <div class="col-sm-10 border-left">{{ $author->is_latvian ? 'Latviešu' : 'Ārzemju' }}</div>
            </div>
        </div>

    </div>
@endsection
