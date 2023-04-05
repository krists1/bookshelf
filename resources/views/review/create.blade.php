@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            @isset($review)
                Pievienot atsauksmi par grāmatu "{{ $review->book->title }}"
            @else
                Pievienot atsauksmi!
            @endif
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

                @isset($review)
                    @method("PATCH")
                @endisset

                <div class="form-group">
                    <label for="title">Nosaukums:</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') ?? $review->title ?? '' }}" />
                </div>

                <div class="form-group">
                    <label for="author_id">Grāmata:</label>

                    <select name="book_id" class="form-control">
                        <option disabled hidden selected>-- Lūdzu izvēlieties grāmatu --</option>

                        @foreach (\App\Models\Book::all() as $book)
                            <option value="{{ $book->id }}" {{
                                (
                                    old('book_id')
                                        ? old('book_id') == $book->id
                                        : ($myBook == $book->id)
                                )
                                ? 'selected' : ''
                            }}>{{ $book->title }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="text">Teksts:</label>
                    <textarea class="form-control" name="text" rows="10">{{ old('text') ?? $review->text ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="grade">Vērtējums:</label>
                    <input type="number" class="form-control" name="grade" value="{{ old('grade') ?? $review->grade ?? '' }}"/>
                </div>
                <div class="form-group">
                    <label for="grade">Publicēt:</label>
                    <input type="hidden" name="published" value="0">
                    <input type="checkbox" class="form-check-input" name="published" {{ (old('published') ?? $review->published ?? false)  ? 'checked' : '' }} value="1"/>
                </div>

                <button type="submit" class="btn btn-primary">Saglabāt</button>
                <a class="btn btn-link" href="{{ route('book.index') }}">Atpakaļ</a>

            </form>
        </div>
    </div>
@endsection
