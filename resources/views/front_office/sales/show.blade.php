@extends('template.default_template')

@section('titre')
    Commandes de {{ $user->name }}
@stop

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ref</th>
            <th>Boissons</th>
            <th>prix</th>
            <th>Date</th>
        </tr>
        </thead>
        @foreach($user->boissons as $boisson)
            <tr>
                <td>{{ $boisson->pivot->id }}</td>
                <td>{{ $boisson->name }}</td>
                <td>{{ $boisson->price }}</td>
                <td>{{ $boisson->pivot->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection