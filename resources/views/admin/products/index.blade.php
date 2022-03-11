@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista Prodotti</div>

                    <div class="card-body">

                        <ul>
                            @foreach ($products as $product)
                                <li>
                                    {{$product->name}};
                                </li>
                            @endforeach
                        </ul>



                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection