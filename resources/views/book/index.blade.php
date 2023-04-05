@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('book.create') }}" class="btn btn-primary">Pievienot grāmatu</a>
        </div>
        <div class="card-body">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif

            <table class="table table-striped">

                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nosaukums</td>
                        <td>Autors</td>
                        <td>Izdevniecība</td>
                        <td class="text-end">Darbības</td>
                    </tr>
                </thead>

                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author->full_name }}</td>
                        <td>{{$book->publisher->name}}</td>
                        <td class="text-end">
                            <a href="{{ route('book.show',$book->id)}}" class="btn btn-primary">Skatīt</a>
                            @can('update', $book)
                                <a href="{{ route('book.edit',$book->id)}}" class="btn btn-secondary">Labot</a>
                            @endcan
                            @can('delete', $book)
                            <form action="{{ route('book.destroy', $book->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="confirm('Vai tiešām dzēst?')">Dzēst</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
