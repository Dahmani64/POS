@extends('recette.template')
@section('content')
@if(session()->has('info'))
        <div class="notification is-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Info Facture</p>
        </header>
        <div class="card-content">
            <div class="content">

                <table class="table is-hoverable">
                    <thead>
                        <tr>  
                            
                            <th>name product</th>
                            <th>quantite</th>
                            <th>price unit</th>
                            <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($commande->commandes_details as $commande_detail)
                                <tr>
                                   <td> {{$commande_detail->product->name}}</td>
                                   <td> {{$commande_detail->quantite}}</td>
                                   <td> {{$commande_detail->product->price }} TND</td>
                                   <td> {{$commande_detail->product->price * $commande_detail->quantite }}TND</td>
                                </tr>
                     @endforeach
                     <tr>
                           <td><strong>Total Facture:</strong></td>
                           <td><strong>{{$commande->total_facture }} TND</strong></td>
                     </tr>
                    <tr>
                    <td><a class="button is-primary" href="{{ route('commandes.index') }}">Return</a></td>   
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection