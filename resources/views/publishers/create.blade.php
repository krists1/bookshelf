@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Jauna izdevniecība
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Nepieciešams pielabot datus, lai saglabātu!</h4>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ $action }}">
                @csrf
                @isset($publisher)
                    @method("PATCH")
                @endisset

                <div class="form-group">
                    <label for="name">Nosaukums:</label>
                    <input type="text" class="form-control" name="name" value="{{ $publisher->name ?? old('name') }}"/>
                </div>
                <div class="form-group">
                    <label for="country">Valsts:</label>
                    <select name="country" class="form-control">
                        <option {{ ($publisher->active ?? old('country')) == 'Latvija' ? "selected" : "" }} value="Latvija">Latvija</option>
                        <option {{ ($publisher->active ?? old('country')) == 'ASV' ? "selected" : "" }} value="ASV">ASV</option>
                        <option {{ ($publisher->active ?? old('country')) == 'Igaunija' ? "selected" : "" }} value="Igaunija">Igaunija</option>
                        <option {{ ($publisher->active ?? old('country')) == 'Lietuva' ? "selected" : "" }} value="Lietuva">Lietuva</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="founded">Dibināšanas gads:</label>
                    <input type="number" max="2023" class="form-control" name="founded" value="{{ $publisher->founded ?? old('founded') }}" />
                </div>
                <div class="form-group">
                    <label for="active">Aktīva:</label>
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" value="1" {{ ($publisher->active ?? old('active')) == 1 ? "checked" : "" }}>
                </div>

                <button type="submit" class="btn btn-primary">Saglabāt</button>
                <a class="btn btn-link" href="{{ route('publishers.index') }}">Atpakaļ</a>

            </form>
        </div>
    </div>
@endsection
