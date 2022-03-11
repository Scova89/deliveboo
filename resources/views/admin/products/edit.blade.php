@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista Prodotti</div>

                    <div class="card-body">

                        <form action="{{route("products.update", $product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="name">Nome prodotto</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del prodotto" value="{{old('name') ?? $product->name}}">
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descrizione prodotto</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Inserisci la descrizione del prodotto" >{{old('description') ?? $product->description}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="intolerance">Intolleranze alimentari del prodotto</label>
                                <textarea class="form-control @error('intolerance') is-invalid @enderror" id="intolerance" name="intolerance" rows="3" placeholder="Inserisci le intolleranze" >{{old('intolerance') ?? $product->intolerance}}</textarea>
                                @error('intolerance')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Prezzo</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il prezzo del prodotto" value="{{old('price') ?? $product->price}}">
                                @error('price')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">

                                <div class="form-check form-check-inline">
                                    @php
                                        $checked = old("visible") ?? $product->visible;
                                    @endphp
                                    <input class="form-check-input @error('visible') is-invalid @enderror" type="checkbox" name="visible" id="visible" value="visible" {{$checked ? "checked" : ""}}>
                                    <label class="form-check-label" for="visible">Visibile</label>
                                </div>
                                
                                @error('visible')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="form-group ">
                                @php
                                    $checked = old("purchasable") ?? $product->purchasable;
                                @endphp
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('purchasable') is-invalid @enderror" type="checkbox" name="purchasable" id="purchasable" value="purchasable" {{$checked ? "checked" : ""}}>
                                    <label class="form-check-label" for="purchasable">In vendita</label>
                                </div>
                                
                                @error('purchasable')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="mb-3" >
                                <p>Immagine</p>
                                
                                @if ($product->image)
                                    <img height="100" src="{{asset("storage/$product->image")}}" alt="{{$product->name}}.' image'">
                                @endif

                                
                                <input type="file" id="image" name="image" onchange="PreviewImage();">
                                <script type="text/javascript">

                                    function PreviewImage() {
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("image").files[0]);

                                        oFReader.onload = function (oFREvent) {
                                            document.getElementById("preview").src = oFREvent.target.result;
                                        };
                                    };

                                </script>
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Salva</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection