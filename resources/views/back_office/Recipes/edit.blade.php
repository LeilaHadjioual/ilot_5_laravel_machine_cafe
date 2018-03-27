@extends('template.default_template')

@section('titre')
    Editer la recette de {{ $boisson->name }}
@stop

@section('content')
    <form method="post" action="/recipes/{{ $boisson->id }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>ID/Ingredient</th>
                <th>Quantity</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr></tr>
            @foreach($boisson->ingredients as $ingredient)
                <tr>
                    <td>
                        <input type="hidden" name="recipe_id[]"
                               value="{{ $ingredient->pivot->id }}">
                        {{ $ingredient->pivot->id }}
                    </td>
                    <td>
                        <input type="hidden" name="ingredients[]" value="{{ $ingredient->id }}">
                        {{ $ingredient->id }}/{{ $ingredient->name }}
                    </td>
                    <td>
                        <input type="number" class="form-control" name="quantity[]"
                               value="{{$ingredient->pivot->quantity}}">
                    </td>
                    <td>
                        <button type="submit" form="delete{{ $ingredient->pivot->id }}" class="btn btn-outline-danger">
                            X
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot id="new_ingredients">
            <tr class="line">
                <td>
                    <a href="#" onclick="return false;" id="add_line" class="btn btn-outline-success">+</a>
                    <a href="#" onclick="return false;" class="remove_line btn btn-outline-danger">-</a>
                </td>
                <td>
                    <select name="new_ingredients[]" class="ingredients form-control">
                        @foreach($all_ingredients as $all_ingredient)
                            <option value="{{$all_ingredient->id}}">{{$all_ingredient->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="new_quantity[]"
                           placeholder="Quantity...">
                </td>
                <td></td>
            </tr>
            </tfoot>
        </table>
        <a href="/ingredients/create" class="btn btn-outline-warning">New ingredient</a>
        <div class="btn-group">
                <button type="submit" class="btn btn-outline-success">Save</button>
                <a href="/boissons/{{$boisson->id}}" class="btn btn-outline-danger">Cancel</a>
        </div>


    </form>
    @foreach($boisson->ingredients as $ingredient)
        <form id='delete{{ $ingredient->pivot->id }}' action="/recipes/{{ $ingredient->pivot->id }}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
        </form>
    @endforeach

@endsection