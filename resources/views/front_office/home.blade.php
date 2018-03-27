@extends('template.default_template')

@section('titre')
    Home de {{ Auth::user()->name }}
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Ref</th>
                <th>Boisson</th>
                <th>Sucre(s)</th>
                <th>Prix</th>
                <th>Monnaie</th>
                <th>Rendue</th>
                <th>Date</th>
            </tr>
            </thead>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->boisson_name }}</td>
                    <td>{{ $sale->sugar }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->money_user }}</td>
                    <td>{{ $sale->make_money }}</td>
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
