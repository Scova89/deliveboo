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
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if (Auth::id() == $product->user_id && $product->visible)  
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->purchasable ? 'Si' : 'No'}}</td>
                                    <td> 
                                        <a href="{{route("products.show", $product->id)}}">
                                            <button type="button" class="btn btn-primary">Visualizza</button>
                                        </a>
                                        <a href="{{route("products.edit", $product->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteBox{{$product->id}}">
                                            Elimina
                                        </button>
                                        <div class="modal fade" id="deleteBox{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteBoxLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteBoxLabel">Conferma l'eliminazione</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare il prodotto?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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