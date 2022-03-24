@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>{{$order->name}}</h3>
                      
                    </div>

                    <div class="card-body">
                       
                        <h4>Nome:</h4>
                        <p>{{$order->name}}</p>

                        <h4>Telefono</h4>    
                        <p>{{$order->phone}}</p>
                        
                        <h4>E-mail</h4>    
                        <p>{{$order->email}}</p>
                        
                        <h4>Indirizzo</h4>    
                        <p>{{$order->address}}</p>
                        
                        
                        <h4>Data ordine</h4>    
                        <p>{{$order->created_at}}</p>
                        
                        <h4>Riepilogo ordine</h4>
                        <ul>
                            @foreach ($order->products as $product)
                            <li>
                                {{$product->name}} | x{{$product->pivot->quantity}} | € {{ $product->price * $product->pivot->quantity }}
                            </li>
                            @endforeach
                        </ul>
                  
                        <h4>Totale ordine</h4>    
                        <p>€ {{$order->total}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection