@extends('template.default_template')

@section('titre')
    Gestion des Pièces
@stop

@section ('content')
    <table class="table">
        <thead>
        <tr>
            <th>Type</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col">{{ $coin->type }}</td>
                <td scope="col">{{ $coin->stock }}</td>
            </tr>
        </tbody>
    </table>
    <a href="/coins/{{ $coin->id }}/edit" type="button" class="align-self-center btn btn-outline-success">Edit</a>
@stop