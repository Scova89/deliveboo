<h1>
    Ordine Confermato!
</h1>
<p>
    Ciao <strong>{{$order->name}}</strong>, ti confermiamo che l'ordine effettuato è andato a buon fine!
</p>

<h3>
    I tuoi dati:
</h3>
<ul>
    <li>
        Nome: {{$order->name}}
    </li>
    <li>
        Telefono: {{$order->phone}}
    </li>
    <li>
        Indirizzo: {{$order->address}}
    </li>
    <li>
        E-mail: {{$order->email}}
    </li>
</ul>

<h3>
    Riepilogo ordine:
</h3>
<ul>
@foreach ($order->products as $product)
    
    <li>
            {{ $product->name }} x{{ $product->pivot->quantity }}
    </li>
@endforeach
</ul>