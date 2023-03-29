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
                        <td></td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
