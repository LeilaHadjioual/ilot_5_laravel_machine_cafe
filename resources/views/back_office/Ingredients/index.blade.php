@extends('template.default_template')

@section('titre')
    Gestion des Ingrédients
@stop

@section ('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">
                @if(isset($sortName))
                    {!! $sortName !!}
                @else
                    <a href="/ingredients/sorts/name/asc">
                        Name
                        <i class="fa fa-sort"></i>
                    </a>
                @endif

            </th>
            <th class="flex-grow-2" scope="col">
                @if(isset($sortStock))
                    {!! $sortStock !!}
                @else
                    <a href="/ingredients/sorts/stock/asc">
                        Stock
                        <i class="fa fa-sort"></i>
                    </a>
                @endif
            </th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ingredients as $ingredient)
            <tr>
                <td>{{$ingredient->name}}</td>
                <td class="flex-grow-2">
                    @include('back_office.Ingredients.progress')
                </td>
                <td>
                    <a href="/ingredients/{{ $ingredient->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/ingredients/create" type="button" class="align-self-center btn btn-outline-success">New</a>
@endsection

