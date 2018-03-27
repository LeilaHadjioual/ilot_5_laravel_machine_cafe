@extends('template.default_template')

@section('titre')
    Gestion de {{ $ingredient->name }}
@stop

@section('content')
    <form action="/ingredients/{{ $ingredient->id }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Color</th>
            </tr>
            </thead>
            <tr>
                <td>{{ $ingredient->id }}</td>
                <td><input type="text" class="form-control" name="name" value="{{ $ingredient->name }}"></td>
                <td>
                    @include('back_office.Ingredients.progress')
                    <input id="slider" type="range" value="{{ $ratio }}" min="0"
                           max="100" step="1" name="stock">
                </td>
                <td><input type="color" class="form-control" name="color" value="{{ $ingredient->color }}"></td>
            </tr>
        </table>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Save</button>
            <a href="/ingredients/{{ $ingredient->id }}" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>
@endsection