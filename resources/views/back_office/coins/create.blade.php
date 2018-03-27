@extends('template.default_template')

@section('titre')
    Ajouter une recette
@stop

@section('content')
    <form method="post" action="/recipes">
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th>Drink</th>
                <th>Ingredient</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            <tr class="line">
                <td>
                    <select name="boisson" class="form-control">
                        @if(isset($ForOne))
                            <option value="{{$boissons->id}}">{{$boissons->name}}</option>
                        @else
                            @foreach($boissons as $boisson)
                                <option value="{{$boisson->id}}">{{$boisson->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </td>
                <td>
                    <select name="ingredients[]" class="ingredients form-control" id="exampleFormControlSelect1">
                        @foreach($ingredients as $ingredient)
                            <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="quantity[]" placeholder="Quantity...">
                </td>
            </tr>

            <tr class="second_line">
                <td>
                    <a id="add_line" class="btn btn-outline-success">+</a>
                </td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Create</button>
            <a href="/recipes" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>

@endsection