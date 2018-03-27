@extends('template.default_template')

@section('titre')
    Details de {{ $ingredient->name }}
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tr>
            <td>{{ $ingredient->id }}</td>
            <td>{{ $ingredient->name }}</td>
            <td>{{ $ingredient->amount }}</td>
            <td>{{ $ingredient->created_at }}</td>
            <td>{{ $ingredient->updated_at }}</td>
        </tr>
    </table>
    <div class="btn-group">
        <a href="/ingredients/{{ $ingredient->id }}/destroy" class="btn btn-outline-danger">Delete</a>
        <a href="/ingredients/{{ $ingredient->id }}/edit" type="submit" class="btn btn-outline-success">Edit</a>
        <a href="/ingredients" class="btn btn-outline-danger">Return</a>
    </div>
    </br></br>
    <h2>{{ $ingredient->name }}'s use</h2>
    </br>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Details</th>
        </tr>
        </thead>
        @foreach($ingredient->boisson as $boisson)
            <tr>
                <td>{{ $boisson->id }}</td>
                <td>{{ $boisson->name }}</td>
                <td>{{ $boisson->pivot->amount }}</td>
                <td>
                    <a href="/boissons/{{ $boisson->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a>
                </td>

            </tr>
        @endforeach
    </table>

@endsection