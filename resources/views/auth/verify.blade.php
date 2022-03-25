@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">Verifica il tuo indirizzo e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nuovo link di verifica è stato inviato al tuo indirizzo e-mail.
                        </div>
                    @endif

                    Prima di procedere, controlla la tua e-mail per un link di verifica.
                    Se non hai ricevuto l'e-mail,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clicca qui per richiederne un'altra</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
