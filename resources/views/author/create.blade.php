@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Autora rediģēšana
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

                @isset($author)
                    @method("PATCH")
                @endisset

                <div class="form-group">
                    <label for="name">Vārds:</label>
                    <input type="text" class="form-control" name="name" value="{{ $author->name ?? ''}}" />
                </div>

                <div class="form-group">
                    <label for="surname">Uzvārds:</label>
                    <input type="text" class="form-control" name="surname"  value="{{ $author->surname ?? ''}}" />
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_latvian" value="1" {{ isset($author) && $author->is_latvian ? 'checked' : '' }}/>
                        <label class="form-check-label" for="defaultCheck1">Latviešu autors</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Saglabāt</button>
                <a class="btn btn-link" href="{{ route('author.index') }}">Atpakaļ</a>

            </form>
        </div>
    </div>
@endsection
