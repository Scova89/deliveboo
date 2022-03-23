<h1>
    Nuovo ordine ricevuto!🥳
</h1>
<h3>
    Dati cliente:
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
    Dati ordine:
</h3>
<ul>
    @foreach ($order->products as $product)
    <li>
        {{$product->name}} | x{{$product->pivot->quantity}} | € {{ $product->price * $product->pivot->quantity }}
    </li>
    @endforeach
</ul>
<h3>
    @php
        $total = 0;
        foreach ($order->products as $product) {
           $total += $product->price * $product->pivot->quantity;
        }
    @endphp
    Totale € {{$total}}
</h3>
