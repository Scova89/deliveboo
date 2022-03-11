@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>{{$product->name}}</h3>
                        <div class="d-flex">
                            <a class="mr-2" href="{{route("products.edit", $product->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                            <form action="{{route("products.destroy", $product->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($product->image)
                            <div class="mb-3">
                                <img style="max-width: 100%" src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
                            </div>
                        @endif
                        <h4>Descrizione</h4>
                        <p>{{$product->description}}</p>

                        <h4>Intolleranze</h4>    
                        <p>{{$product->intolerance}}</p>
                        
                        <h4>Prezzo</h4>    
                        <p>€ {{$product->price}}</p>
                        
                        @if ($product->visible)
                            <h4><span class="badge badge-success">Visibile</span></h4>
                        @else
                            <h4><span class="badge badge-danger">Non visibile</span></h4>
                        @endif
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