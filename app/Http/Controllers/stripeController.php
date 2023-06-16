<?php

namespace App\Http\Controllers;
// \Stripe\Stripe::setApiKey(config(key:'stripe.sk'));

use App\Models\cart_product;
use App\Models\offer;
use App\Models\order_productModel;
use App\Models\ordermodel;
use App\Models\Product;
use Illuminate\Http\Request;

class stripeController extends Controller
{
    public function index(){

        return view('checkout');
    }

    public function checkout(Request $request){

        $user = auth()->user();
        $carts = $user->carts()->with('products')->get();

        $line_items = [];

        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                $line_items[] = [
                    'price_data'=>[
                        'currency'=>'usd',
                        'product_data'=>[
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price*100,
                    ],
                    'quantity' => $product->pivot->quantity,
                ];
            }
        }

        // Store the form input data in the session
        $full_n=$request->input('fname')." ".$request->input('lname');
        session()->put('checkout_data', [
            'fname' => $full_n,
            'email' => $request->input('email'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'street_address' => $request->input('address'),
            'code_postal' => $request->input('code_postal'),
            'total_price' => $request->input('total_price'),
        ]);

        \Stripe\Stripe::setApiKey(env('STRIPE_SK'));
        $session=\Stripe\Checkout\Session::create([
            'line_items'=> $line_items,
            'mode'=>'payment',
            'success_url' => route('success'),
            'cancel_url' => route('index')
        ]);

        return redirect($session->url);
    }

    public function success(Request $request){
        $products=Product::latest()->paginate(12);
        $offers=offer::latest()->paginate(4);

        // Retrieve the form input data from the session
        $checkout_data = session()->get('checkout_data');

        $user = auth()->user();
        $order = new ordermodel();
        $order->f_name = $checkout_data['fname'];
        $order->email = $checkout_data['email'];
        $order->country = $checkout_data['country'];
        $order->city = $checkout_data['city'];
        $order->street_addres = $checkout_data['street_address'];
        $order->code_postal = $checkout_data['code_postal'];
        $order->total_price = $checkout_data['total_price'];
        $order->save();


        $user = auth()->user();
        $cartProducts = cart_product::where(['user_id' => $user->id])->get();
        $i=0;
        foreach($cartProducts as $cp) {
            $order_product=new order_productModel();
            $order_product->order_id=$order->id;
            $order_product->product_id=$cp->id;
            $order_product->save();
                $cp->delete();
        }


        session()->flash('success', 'Your order has been successfully placed.');
        return view('/ACC',compact('products','offers'));
    }
}
