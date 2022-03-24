@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista Ordini</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nome Cliente</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $order)
                                    @if (Auth::id() == $order->user_id)  
                                    <tr>
                                        <th scope="row">{{$order->id}}</th>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td> 
                                            <a href="{{route("orders.show", $order->id)}}">
                                                <button type="button" class="btn btn-primary">Visualizza</button>
                                            </a>
                                            {{-- <a href="{{route("orders.edit", $order->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a> --}}
                                            {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteBox{{$order->id}}">
                                                Elimina
                                            </button>
                                            <div class="modal fade" id="deleteBox{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteBoxLabel" aria-hidden="true">
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
                                                            <form action="{{route('orders.destroy', $order->id)}}" method="POST">
                                                                @csrf
                                                                @method("DELETE")
                                                                <button type="submit" class="btn btn-danger">Elimina</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
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