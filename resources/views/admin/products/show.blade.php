@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>{{$product->name}}</h3>
                        <div class="d-flex">
                            <a class="mr-2" href="{{route("products.edit", $product->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                            <!-- <form action="{{route("products.destroy", $product->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form> -->
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
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($product->image)
                            <div class="mb-3">
                                <img style="max-height: 200px" src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
                            </div>
                        @endif
                        <h4>Descrizione</h4>
                        <p>{{$product->description}}</p>

                        <h4>Intolleranze</h4>    
                        <p>{{$product->intolerance}}</p>
                        
                        <h4>Prezzo</h4>    
                        <p>€ {{$product->price}}</p>
                        
                        <!-- @if ($product->visible)
                            <h4><span class="badge badge-success">Visibile</span></h4>
                        @else
                            <h4><span class="badge badge-danger">Non visibile</span></h4>
                        @endif -->
                        @if ($product->purchasable)
                            <h4><span class="badge badge-success">Acquistabile</span></h4>
                        @else
                            <h4><span class="badge badge-danger">Non acquistabile</span></h4>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection