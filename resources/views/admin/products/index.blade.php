@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista Prodotti</div>

                    <div class="card-body">
                        <a href="{{route("products.create")}}">
                            <button type="button" class="btn btn-success">Crea Prodotto</button>
                        </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nome Prodotto</th>
                                    <th scope="col">In vendita</th>
                                    <th scope="col">Visibile</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if (Auth::id() == $product->user_id)  
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->purchasable ? 'Si' : 'No'}}</td>
                                    <td>{{$product->visible ? 'Si' : 'No'}}</td>
                                    <td> 
                                        <a href="{{route("products.show", $product->id)}}">
                                            <button type="button" class="btn btn-primary">Visualizza</button>
                                        </a>
                                        <a href="{{route("products.edit", $product->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                    </td>

                                </tr>
                                @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection