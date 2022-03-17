@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrazione</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                Nome attività <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">
                                Città <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" value="Polignano a Mare" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">
                                Indirizzo <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                Telefono <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" maxlength="15" minlength="9">                               
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="iva" class="col-md-4 col-form-label text-md-right">
                                Partita IVA <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="iva" type="text" class="form-control @error('iva') is-invalid @enderror" name="iva" value="{{ old('iva') }}" required autocomplete="iva" minlength="11" maxlength="11" pattern="[0-9]{11}">
                                @error('iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                E-Mail <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                Password <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                Conferma Password <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="password-errore" style="padding-left: 15px; padding-right: 15px;"></div>    
                        </div>
                        <div class="form-group typologies row">
                                    <p class="col-md-4 col-form-label text-md-right">
                                        Tipologie: <span style="color: red">*</span>
                                    </p>
                                    <div class="container-typologies col-md-6">
                                        <div>
                                            @foreach ($typologies as $typology)
                                            <div class="form-check form-check">
                                                <input class="form-check-input" type="checkbox" name="typologies[]" id="{{$typology->slug}}" value="{{$typology->id}}" {{in_array($typology->id, old("typologies", []))? 'checked' : ''}}>
                                                <label class="form-check-label" for="{{$typology->slug}}">{{$typology->name}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @error('typologies')
                                        <div class="mt-2 offset-md-4 col-md-6" style="padding-left: 15px; padding-right: 15px;">
                                            <div class="alert alert-danger">{{$message}}</div>
                                        </div>    
                                    @enderror
                                </div>
                        <div class="mb-3 row" >
                            <label for="image" class="col-md-4 col-form-label text-md-right">Carica immagine del ristorante:</label>          
                            <div class="col-md-6 d-flex align-items-center">
                                <img id="preview" width="100" src="" class="mr-2">
                                <input type="file" id="image" name="image" onchange="PreviewImage();" class="@error('image') is-invalid @enderror">
                            </div>
                            
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
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row mb-0 mt-5">
                            <div class="col-md-6 offset-md-4" >
                                <button type="submit" class="btn btn-primary"id="registrati_button">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let passwordControll = false;
    let registrati_button = document.getElementById('registrati_button');
    registrati_button.addEventListener('click', function() {
        controlloPassword();
        if (passwordControll == false){
            event.preventDefault();
        }
    });
    function controlloPassword() {
        let password1 = document.getElementById('password');
        let password2 = document.getElementById('password-confirm');
        if (password1.value == '' || password2.value == '') {
            passwordControll= false;
            document.getElementById('password-errore').innerHTML = 
            `<div class="alert alert-danger">E' obbligatorio inserire entrambi i campi delle password.</div>`;
        } else if (password1.value !== password2.value ) {
            password1.classList.add('errore');
            password2.classList.add('errore');
            passwordControll=false;
            document.getElementById('password-errore').innerHTML = 
            `<div class="alert alert-danger">Le password non corrispondono.</div>`;
        } 
    }
</script>
@endsection
