@extends('template.default_template')

@section('titre')
    Gestion des boissons
@stop

@section('content')
    <table class="table table-hover">
        <thead class="">
        <tr>
            <th>
                @if(isset($sortName))
                    {!! $sortName !!}
                @else
                    <a href="/boissons/sorts/name/asc">
                        Name
                        <i class="fa fa-sort"></i>
                    </a>
                @endif
            </th>
            <th>
                @if(isset($sortPrice))
                    {!! $sortPrice !!}
                @else
                    <a href="/boissons/sorts/price/asc">
                        Price
                        <i class="fa fa-sort"></i>
                    </a>
                @endif
            </th>
            <th>Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($boissons as $boisson )
            <tr>
                <td>{{ $boisson->name }}</td>
                <td>{{ $boisson->price }}</td>
                <td>
                    <a href="/boissons/{{ $boisson->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/boissons/create" type="button" class="align-self-center btn btn-outline-success">New</a>
@endsection