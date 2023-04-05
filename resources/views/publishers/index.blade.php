@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('publishers.create') }}" class="btn btn-primary">Pievienot izdevniecību</a>
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
                    <td>Valsts</td>
                    <td>Gads</td>
                    <td class="text-end">Darbības</td>
                </tr>
                </thead>

                <tbody>
                @foreach($publishers as $publisher)
                    <tr>
                        <td>{{$publisher->id}}</td>
                        <td>{{$publisher->name}}</td>
                        <td>{{$publisher->country}}</td>
                        <td>{{$publisher->founded}}</td>
                        <td>
                            <a href="{{ route('publishers.show', $publisher->id)}}" class="btn btn-primary">Skatīt</a>
                            <a href="{{ route('publishers.edit', $publisher->id)}}" class="btn btn-secondary">Labot</a>
                            <form action="{{ route('publishers.destroy', $publisher->id)}}" method="post" class="d-inline">
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
