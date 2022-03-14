@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tipologie</div>
                    <div class="card-body">
                        <form action="{{route("typologies.store")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome Tipologia</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del prodotto" value="{{old('name')}}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3" >
                                <p>Immagine</p>
                                <img id="preview" width="100" src="">
                                <input type="file" id="image" name="image" onchange="PreviewImage();" required>
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