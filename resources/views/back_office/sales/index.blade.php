@extends('template.default_template')

@section('titre')
    Index commandes
@stop

@section('content')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Ref</th>
                <th>Boisson</th>
                <th>Sucre(s)</th>
                <th>Monnaie</th>
                <th>Prix</th>
                <th>Rendu</th>
                <th>User</th>
                <th>Date</th>
            </tr>
            </thead>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->boisson_name }}</td>
                    <td>{{ $sale->sugar }}</td>
                    <td>{{ $sale->money_user }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->make_money }}</td>
                    @if(isset($sale->user->name))
                        <td>{{ $sale->user->name }}</td>
                    @else
                        <td>guest</td>
                    @endif
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection