@extends('template.default_template')

@section('titre')
    Details de {{ $ingredient->name }}
@stop

@section('content')
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Color</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tr>
                <td>{{ $ingredient->id }}</td>
                <td>{{ $ingredient->name }}</td>
                <td>
                    @include('back_office.Ingredients.progress')

                </td>
                <td><span class="btn colory" style="background-color: {{ $ingredient->color }}; color: {{ $ingredient->color }}">!</span></td>
                <td>
                    <form id='delete{{ $ingredient->id }}' action="/ingredients/{{ $ingredient->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" form="delete{{ $ingredient->id }}" class="btn btn-outline-danger">X
                        </button>
                    </form>
                </td>
            </tr>
        </table>
        <a href="/ingredients/{{ $ingredient->id }}/edit" type="submit" class="btn btn-outline-success">Edit</a>
    </div>

    <div>
        <h2>{{ $ingredient->name }}'s use</h2>
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
                    <td>{{ $boisson->pivot->quantity }}</td>
                    <td>
                        <a href="/boissons/{{ $boisson->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection