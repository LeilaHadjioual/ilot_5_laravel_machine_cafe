@extends('template.default_template')

@section('titre')
    Gestion de {{ $boisson->name }}
@stop

@section('content')
    <form action="/boissons/{{ $boisson->id }}" method="POST" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tr>
                <td>{{ $boisson->id }}</td>
                <td><input type="text" class="form-control" name="name" value="{{ $boisson->name }}"></td>
                <td><input type="number" class="form-control" name="price" value="{{ $boisson->price }}"></td>
            </tr>
        </table>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Save</button>
            <a href="/boissons/{{ $boisson->id }}" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>

@endsection