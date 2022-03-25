@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
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
                                                <button type="button" class="btn btn-primary rounded-pill">Visualizza</button>
                                            </a>
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