@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row row-cols-2">
                            <div class="col-xl-6 col-12 "><h4>Nome Ristorante: {{Auth::user()->name}}</h4></div>
                            <div class="col-xl-6 col-12"><h4>Indirizzo: {{Auth::user()->address}}</h4></div>
                            <div class="col-xl-6 col-12"><h4>Telefono: {{Auth::user()->phone}}</h4></div>
                            <div class="col-xl-6 col-12"><h4>Città: {{Auth::user()->city}}</h4></div>
                            <div class="col-xl-6 col-12"><h4>Email: {{Auth::user()->email}}</h4></div>
                            <div class="col-xl-6 col-12"><h4>Partita IVA: {{Auth::user()->iva}}</h4></div>
                            <div class="col-xl-6 col-12"><h4>Stato: {{Auth::user()->open ? 'Aperto' : 'Chiuso'}}</h4></div>
                            <div class="col-xl-6 col-12">
                                @if (count(Auth::user()->typologies) > 0)
                                        <h4 class="mb-3">
                                            Menu:
                                            @foreach (Auth::user()->typologies as $typology)
                                                <span>{{$typology->name}}, </span>
                                            @endforeach
                                        </h4>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->image)
                        <img src="{{asset('storage/' . Auth::user()->image)}}" alt="{{Auth::user()->name}}" style="height: 200px" class="rounded-lg mx-auto d-block">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
