<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Product;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    protected $validationRule = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'phone' => ['required','digits_between:8,15', 'numeric'],
    ];


    public function generateToken(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token,
        ];

        return response()->json($data,200);
    }
    public function checkdata(Request $request){

        $request->validate($this->validationRule);
        
        return response()->json(['success' => true],200);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {
        $data = $request->all();
        $total = 0;
        $cart = $data['cart'];

        $product = Product::find($cart[0]['id']);
        $user_id = $product->user_id;

        foreach ($cart as $product) {
            $total += Product::find($product['id'])->price * $product['quantity'];
        }

        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $data['tokenClient'],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {

            $newOrder = new Order();

            $newOrder->user_id = $user_id;
            $newOrder->name = $data['client']['name'];
            $newOrder->email = $data['client']['email'];
            $newOrder->address = $data['client']['address'];
            $newOrder->phone = $data['client']['phone'];
            $newOrder->total = $total;
            $newOrder->save();

            foreach ($cart as $product) {
                $newOrder->products()->attach($product["id"], ['quantity' => $product["quantity"]]);
            }

            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data, 401);
        }
    }
}





