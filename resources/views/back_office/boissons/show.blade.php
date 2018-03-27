@extends('template.default_template')

@section('titre')
    {{--<a href="/boissons" class="fa fa-angle-left fa-lg"></a>--}}
    Details de {{ $boisson->name }}
    {{--<a href="/boissons" class="fa fa-angle-right fa-lg"></a>--}}
@stop

@section('content')
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th class="flex-grow-2">Nom</th>
                <th>Prix</th>
                <th>Color</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $boisson->id }}</td>
                <td class="flex-grow-2">{{ $boisson->name }}</td>
                <td>{{ $boisson->price }}</td>
                <td><span class="btn colory" style="background-color: {{ $boisson->color }}; color: {{ $boisson->color }}">!</span></td>
                <td>
                    <form id='delete{{ $boisson->id }}' action="/boissons/{{ $boisson->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" form="delete{{ $boisson->id }}" class="btn btn-outline-danger">X</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="/boissons/{{ $boisson->id }}/edit" type="submit" class="btn btn-outline-success">Edit</a>
    </div>
    <div>
        <h2>Recipe</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th class="flex-grow-2">ID/Ingredient</th>
                <th class="flex-grow-2">Amount</th>
                <th>Details</th>
            </tr>
            </thead>
            @foreach($boisson->ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->pivot->id }}</td>
                    <td class="flex-grow-2">{{ $ingredient->id }}/{{$ingredient->name}}</td>
                    <td class="flex-grow-2">{{ $ingredient->pivot->quantity }}</td>
                    <td>
                        <a href="/ingredients/{{ $ingredient->id }}" class="fa fa-search-plus fa-lg"
                           aria-hidden="true"></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="/recipes/{{ $boisson->id }}/edit" type="submit" class="btn btn-outline-success">Edit Recipe</a>
    </div>

    <div>
        <h2>Sales</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Ref</th>
                <th>User</th>
                <th>Purchased at</th>
            </tr>
            </thead>
            @foreach($boisson->users as $user)
                <tr>
                    <td>{{ $user->pivot->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->pivot->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection