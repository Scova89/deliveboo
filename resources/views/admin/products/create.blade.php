@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista Prodotti</div>

                    <div class="card-body">

                        <form action="{{route("products.store")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome prodotto</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del prodotto" value="{{old('name')}}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descrizione prodotto</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Inserisci la descrizione del prodotto" required>{{old('description')}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="intolerance">Intolleranze alimentari del prodotto</label>
                                <textarea class="form-control @error('intolerance') is-invalid @enderror" id="intolerance" name="intolerance" rows="3" placeholder="Inserisci le intolleranze" >{{old('intolerance')}}</textarea>
                                @error('intolerance')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Prezzo</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il prezzo del prodotto" value="{{old('price')}}" required>
                                @error('price')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group ">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('purchasable') is-invalid @enderror" type="checkbox" name="purchasable" id="purchasable" value="purchasable" {{old("purchasable") ? 'checked' : ''}}>
                                    <label class="form-check-label" for="purchasable">In vendita</label>
                                </div>
                                
                                @error('purchasable')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="mb-3" >
                                <p>Immagine</p>
                                
                                <img id="preview" width="100" src="">

                                
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