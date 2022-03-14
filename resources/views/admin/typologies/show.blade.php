@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>{{$typology->name}}</h3>
                        <div class="d-flex">
                            <a class="mr-2" href="{{route("typologies.edit", $typology->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                            <!-- <form action="{{route("typologies.destroy", $typology->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form> -->
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
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($typology->image)
                            <div class="mb-3">
                                <img style="max-width: 100%" src="{{asset('storage/' . $typology->image)}}" alt="{{$typology->name}}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection