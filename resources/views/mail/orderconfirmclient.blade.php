<h1>
    Ordine Confermato!
</h1>
<p>
    Ciao <strong>{{$order->name}}</strong>, ti confermiamo che l'ordine effettuato è andato a buon fine!
</p>

<h2>
    Riepilogo ordine:
</h2>
<ul>
@foreach ($order->products as $product)
    
    <li>
        <span>
            {{ $product->name }}
        </span>
        <span>
            x{{ $product->pivot->quantity }}
        </span>
    </li>
@endforeach
</ul>