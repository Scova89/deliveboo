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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="name-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">
                                Città <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" value="Polignano a Mare" required disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="city-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">
                                Indirizzo <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="address-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                Telefono <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required maxlength="15" minlength="9">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="phone-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="form-group row">
                            <label for="iva" class="col-md-4 col-form-label text-md-right">
                                Partita IVA <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="iva" type="text" class="form-control @error('iva') is-invalid @enderror" name="iva" value="{{ old('iva') }}" required minlength="11" maxlength="11" pattern="[0-9]{11}">
                                @error('iva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="iva-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                E-Mail <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="email-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                Password <span style="color: red">*</span>
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                                        <input class="form-check-input tipologia-checkbox" type="checkbox" name="typologies[]" id="{{$typology->slug}}" value="{{$typology->id}}" {{in_array($typology->id, old("typologies", []))? 'checked' : ''}}>
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
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="tipologia-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="mb-3 row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Carica immagine del ristorante: <span style="color: red">*</span></label>
                            <div class="col-md-6 d-flex align-items-center">
                                <img id="preview" width="100" src="" class="mr-2">
                                <input type="file" id="image" name="image" onchange="PreviewImage();" class="@error('image') is-invalid @enderror">
                            </div>

                            <script type="text/javascript">
                                function PreviewImage() {
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("image").files[0]);
                                    oFReader.onload = function(oFREvent) {
                                        document.getElementById("preview").src = oFREvent.target.result;
                                    };
                                };
                            </script>
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="mt-2 offset-md-4 col-md-6" id="image-errore" style="padding-left: 15px; padding-right: 15px;"></div>
                        </div>
                        <div class="form-group row mb-0 mt-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="registrati_button">
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
    let addressControll = false;
    let phoneControll = false;
    let tipologiaControll = false;
    let ivaControll = false;
    let emailControll = false;
    let nameControll = false;
    let cityControll = false;
    let passwordControll = false;
    let imageControll = false;

    let registrati_button = document.getElementById('registrati_button');
    registrati_button.addEventListener('click', function() {
        controlloPassword();
        controlloName();
        controlloCity();
        controlloAddress();
        controlloPhone();
        controlloTipologia();
        controlloIva();
        controlloEmail();
        controlloImage();

        if (passwordControll == false || nameControll == false || cityControll == false || addressControll == false || phoneControll == false || ivaControll == false || tipologiaControll == false || emailControll == false || imageControll == false) {
            event.preventDefault();
        }
    });

    function controlloPassword() {
        passwordControll = false;

        let password1 = document.getElementById('password');
        let password2 = document.getElementById('password-confirm');
        if (password1.value == '' || password2.value == '') {
            passwordControll = false;
            document.getElementById('password-errore').innerHTML =
                `<div class="alert alert-danger">E' obbligatorio inserire entrambi i campi delle password.</div>`;
        } else if (password1.value !== password2.value) {
            password1.classList.add('errore');
            password2.classList.add('errore');
            passwordControll = false;
            document.getElementById('password-errore').innerHTML =
                `<div class="alert alert-danger">Le password non corrispondono.</div>`;
        } else {
            document.getElementById('password-errore').innerHTML = null;
            passwordControll = true;

        }
    }

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

    function controlloCity() {
        cityControll = false;

        let city = document.getElementById('city');
        if (city.value == '') {
            cityControll = false;
            document.getElementById('city-errore').innerHTML =
                `<div class="alert alert-danger">Questo campo non può essere vuoto</div>`;
        } else if (city.value !== 'Polignano a Mare') {
            cityControll = false;
            document.getElementById('city-errore').innerHTML = `<div class="alert alert-danger">Al momento la registrazione è aperta ai soli ristoranti di Polignano a Mare</div>`;
        } else {
            document.getElementById('city-errore').innerHTML = null;

            cityControll = true;

        }
    }

    function controlloAddress() {
        addressControll = false;
        let address = document.getElementById('address');
        if (address.value == '') {
            addressControll = false;
            document.getElementById('address-errore').innerHTML =
                `<div class="alert alert-danger">Questo campo non può essere vuoto</div>`;
        } else {
            document.getElementById('address-errore').innerHTML = null;

            addressControll = true;

        }
    }

    function controlloPhone() {
        phoneControll = false;
        let phone = document.getElementById('phone');
        if (phone.value == '') {
            phoneControll = false;
            document.getElementById('phone-errore').innerHTML =
                `<div class="alert alert-danger">Questo campo non può essere vuoto</div>`;
        } else if (isNaN(phone.value)) {
            phoneControll = false;
            document.getElementById('phone-errore').innerHTML =
                `<div class="alert alert-danger">Il numero inserito non è valido.</div>`;
        } else {
            document.getElementById('phone-errore').innerHTML = null;
            phoneControll = true;
        }
    }

    function controlloEmail() {
        emailControll = false;
        let email = document.getElementById('email');
        if (email.value == '') {
            emailControll = false;
            document.getElementById('email-errore').innerHTML =
                `<div class="alert alert-danger">Questo campo non può essere vuoto</div>`;
        } else {
            document.getElementById('email-errore').innerHTML = null;
            emailControll = true;
        }
    }

    function controlloIva() {
        ivaControll = false;
        let iva = document.getElementById('iva');
        if (iva.value == '') {
            ivaControll = false;
            document.getElementById('iva-errore').innerHTML =
                `<div class="alert alert-danger">Questo campo non può essere vuoto</div>`;
        } else if (isNaN(iva.value)) {
            ivaControll = false;
            document.getElementById('iva-errore').innerHTML =
                `<div class="alert alert-danger">La Partita IVA inserita non è valida.</div>`;
        } else {
            document.getElementById('iva-errore').innerHTML = null;
            ivaControll = true;
        }
    }

    function controlloImage() {

        let image = document.getElementById('image');
        if (image.value == '') {
            imageControll = false;
            document.getElementById('image-errore').innerHTML = 
            `<div class="alert alert-danger">E' obbligatorio inserire un'immagine.</div>`;
        } else {
            document.getElementById('image-errore').innerHTML = null;
            imageControll = true;
        }
    }

    function controlloTipologia() {
        tipologiaControll = false;
        let tipologia = document.getElementsByClassName('tipologia-checkbox');
        for (let i = 0; i < tipologia.length; i++) {
            if (tipologia[i].checked) {
                tipologiaControll = true
                document.getElementById('tipologia-errore').innerHTML = null;
            }
        }
        if (tipologiaControll == false) {
            tipologiaControll = false
            document.getElementById('tipologia-errore').innerHTML = `<div class="alert alert-danger">E' obbligatorio selezionare almeno una tipologia.</div>`;
        }
    }
</script>
@endsection