@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('author.create') }}" class="btn btn-primary">Pievienot autoru</a>
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
                        <td>Vārds</td>
                        <td>Uzvārds</td>
                        <td class="text-end">Darbības</td>
                    </tr>
                </thead>

                <tbody>
                @foreach($authors as $record)
                    <tr>
                        <td>{{$record->id}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->surname}}</td>
                        <td class="text-end">
                        <a href="{{ route('author.show',$record->id)}}" class="btn btn-primary">Skatīt</a>
                        <a href="{{ route('author.edit',$record->id)}}" class="btn btn-secondary">Labot</a>
                            <form action="{{ route('author.destroy', $record->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="confirm('Vai tiešām dzēst?')">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
