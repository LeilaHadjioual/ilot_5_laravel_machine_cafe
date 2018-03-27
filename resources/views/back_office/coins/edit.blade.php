@extends('template.default_template')

@section('titre')
    Gestion des Pièces
@stop

@section ('content')
    <form action="/coins/{{ $coin->id }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th>Type</th>
                <th>Stock</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td scope="col">{{ $coin->type }}€</td>
                <td scope="col"><input type="number" class="form-control" name="stock" value="{{ $coin->stock }}">
                </td>
                <td>
                    <button class="btn btn-outline-danger">X</button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Save</button>
            <a href="/coins/{{ $coin->id }}" class="btn btn-outline-danger">Cancel</a>
        </div>

    </form>
@stop