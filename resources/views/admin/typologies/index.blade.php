@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista Tipologie</div>
                <div class="card-body">
                    <a href="{{route("typologies.create")}}">
                        <button type="button" class="btn btn-success mb-3">Crea Tipologia</button>
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome Tipologia</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($typologies as $typology)
                            @if (Auth::user()->admin ) 
                            <tr>
                                <th scope="row">{{$typology->id}}</th>
                                <td>{{$typology->name}}</td>
                                <td> 
                                    <a href="{{route("typologies.show", $typology->id)}}">
                                        <button type="button" class="btn btn-primary">Visualizza</button>
                                    </a>
                                    <a href="{{route("typologies.edit", $typology->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteBox{{$typology->id}}">
                                        Elimina
                                    </button>
                                    <div class="modal fade" id="deleteBox{{$typology->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteBoxLabel" aria-hidden="true">
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
                                                    <form action="{{route('typologies.destroy', $typology->id)}}" method="POST">
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