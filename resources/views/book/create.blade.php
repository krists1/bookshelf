@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Pievienot grāmatu!
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

                @isset($book)
                    @method("PATCH")
                @endisset

                <div class="form-group">
                    <label for="title">Nosaukums:</label>
                    <input type="text" class="form-control" name="title" value="{{ $book->title ?? ''}}" />
                </div>

                <div class="form-group">
                    <label for="author_id">Autors:</label>

                    <select name="author_id" class="form-control">
                        <option disabled hidden selected>-- Lūdzu izvēlieties autoru --</option>

                        @foreach (\App\Models\Author::all() as $author)
                            <option value="{{ $author->id }}" {{ isset($book) && $book->author->id == $author->id ? 'selected' : ''}}>{{ $author->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Apraksts:</label>
                    <textarea class="form-control" name="description" rows="10">{{ $book->description ?? ''}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Saglabāt</button>
                <a class="btn btn-link" href="{{ route('book.index') }}">Atpakaļ</a>

            </form>
        </div>
    </div>
@endsection
