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
                            <div class="mt-2" id="name-errore" ></div>
                            <div class="form-group">
                                <label for="description">Descrizione prodotto</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Inserisci la descrizione del prodotto" required>{{old('description')}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mt-2" id="description-errore" ></div>
                            <div class="form-group">
                                <label for="intolerance">Intolleranze alimentari del prodotto</label>
                                <textarea class="form-control @error('intolerance') is-invalid @enderror" id="intolerance" name="intolerance" rows="3" placeholder="Inserisci le intolleranze" >{{old('intolerance')}}</textarea>
                                @error('intolerance')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mt-2" id="intolerance-errore" ></div>
                            <div class="form-group">
                                <label for="price">Prezzo</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il prezzo del prodotto" value="{{old('price')}}" required>
                                @error('price')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-2" id="price-errore" ></div>
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
                            <button type="submit" class="btn btn-primary" id="save-button">Salva</button>
                        </form>



                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        let nameControll = false;
        let descriptionControll = false;
        let priceControll = false;
        
        let save_button = document.getElementById('save-button');
        save_button.addEventListener('click', function() {
            controlloDescription();
            controlloName();
            controlloPrice();

            if (descriptionControll == false || nameControll == false || priceControll == false) {
                event.preventDefault();
            }
        });

        function controlloName() {
            nameControll = false;
            let name = document.getElementById('name');
            if (name.value == '') {
                nameControll = false;
                document.getElementById('name-errore').innerHTML =
                    `<div class="alert alert-danger">E' obbligatorio inserire un nome.</div>`;
            } else {
                document.getElementById('name-errore').innerHTML = null;
                nameControll = true;

            }
        }

        function controlloDescription() {
            descriptionControll = false;

            let description = document.getElementById('description');
            if (description.value == '') {
                descriptionControll = false;
                document.getElementById('description-errore').innerHTML =
                    `<div class="alert alert-danger">Questo campo non può essere vuoto</div>`;
            } else {
                document.getElementById('description-errore').innerHTML = null;
                descriptionControll = true;

            }
        }

        function controlloPrice() {
            priceControll = false;
            let price = document.getElementById('price');
            if (price.value == '') {
                priceControll = false;
                document.getElementById('price-errore').innerHTML =
                    `<div class="alert alert-danger">Questo campo non può essere vuoto</div>`;
            } else if (isNaN(price.value)) {
                priceControll = false;
                document.getElementById('phone-errore').innerHTML =
                    `<div class="alert alert-danger">Il prezzo inserito non è valido.</div>`;
            } else {
                document.getElementById('price-errore').innerHTML = null;
                priceControll = true;
            }
        }
    </script>
@endsection