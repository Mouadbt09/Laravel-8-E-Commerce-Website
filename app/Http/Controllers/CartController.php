<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\cart_product;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index2()
    {
        $user = auth()->user();
        $carts = $user->carts()->with('products')->get();

        $products = [];

        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                $product->quantity = $product->pivot->quantity;
                $products[] = $product;
            }
        }

        return view('/cart', ['products' => $products]);
    }

    public function index()
    {
        $user = auth()->user();
        $list = cart_product::where(['user_id' => $user->id])->get();
        $i=0;
        foreach($list as $cp) {
            $p=Product::where(['id'=> $cp->product_id])->first();
            $il=$list[$i++];
            $il->name=$p->name;
            $il->img1=$p->img1;
        }

        return view('/cart', compact('list'));

    }

    public function add(Request $request, $id)
    {
        $user = auth()->user();
        $cart = $user->cart;
        $carts = $user->carts()->with('products')->get();

        $products = [];

        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                $product->quantity = $product->pivot->quantity;
                $products[] = $product;
            }
        }
        $ex = false;
        foreach ($products as $p) {
            if ($p->id == $id) {
                $ex = true;
            }
        }

        $produit = Product::findorFail($id);
        $price = $produit->price;
        if (!$ex) {
            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }
            $cp = new cart_product();
            $cp->product_id = $id;
            $cp->quantity = 1;
            $cp->size = "s3_5_yrs";
            $cp->price = $price;
            $cp->cart_id = $cart->id;
            $cp->user_id = $user->id;
            $cp->save();
            return response()->json(['message' => 'product added to cart', "success" => true]);
        } else {
            return response()->json(['message' => 'product alreay added to cart', "success" => false]);
        }
    }

    public function add2(Request $request, $id,$sz)
    {
        $user = auth()->user();
        $cart = $user->cart;
        $carts = $user->carts()->with('products')->get();

        $products = [];

        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                $product->quantity = $product->pivot->quantity;
                $products[] = $product;
            }
        }
        $ex = false;
        foreach ($products as $p) {
            if ($p->id == $id) {
                $ex = true;
            }
        }

        $produit = Product::findorFail($id);
        $price = $produit->price;
        if (!$ex) {
            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }
            $cp = new cart_product();
            $cp->product_id = $id;
            $cp->quantity = 1;
            $cp->size = $sz;
            $cp->price = $price;
            $cp->cart_id = $cart->id;
            $cp->user_id = $user->id;
            $cp->save();
            return response()->json(['message' => 'product added to cart', "success" => true]);
        } else {
            return response()->json(['message' => 'product alreay added to cart', "success" => false]);
        }
    }

    public function update(Request $request, $quantity, $product_id,$iprice)
    {
        $user = auth()->user();
        $cartProducts = cart_product::where(['product_id' => $product_id])->first();

        if ($cartProducts) {
            $cartProducts->quantity = $quantity;
            $cartProducts->price = $quantity*$iprice;
            $cartProducts->save();
            return response()->json(['message' => 'Quantity updated', 'success' => true]);
        } else {
            return response()->json(['message' => 'Product not found in cart', 'success' => false]);
        }
    }

    public function updatesize(Request $request, $size, $product_id)
    {
        $user = auth()->user();
        $cartProducts = cart_product::where(['product_id' => $product_id])->first();

        if ($cartProducts) {
            $cartProducts->size = $size;
            $cartProducts->save();
            return response()->json(['message' => 'size updated', 'success' => true]);
        } else {
            return response()->json(['message' => 'Product not found in cart', 'success' => false]);
        }
    }

    // public function destroy2($id)
    // {
    //     $user = auth()->user();
    //     $cart = $user->cart;
    //     $carts = $user->carts()->with('products')->get();

    //     foreach ($carts as $cart) {
    //         $cart->products()->detach($id);
    //     }

    //     $list = [];
    //     foreach ($cart->products as $product) {
    //         if ($product->id != $id) {
    //             $list[] = $product;
    //         }
    //     }

    //     return response()->json([
    //         'message' => 'Product  has been removed from your cart', 'success' => true
    //     ]);
    // }
    public function destroy($id)
    {
        $user = auth()->user();
        $cartProducts = cart_product::where(['user_id' => $user->id])->get();
        $i=0;
        foreach($cartProducts as $cp) {
            if($cp->product_id==$id){
                $cp->delete();
            }
        }

        return response()->json([
            'message' => 'Product  has been removed from your cart', 'success' => true
        ]);

    }

    // public function checkout()
    // {
    //     $user = auth()->user();
    //     $cartProducts2 = cart_product::where(['user_id' => $user->id])->get();
    //     return view('/checkout', compact('cartProducts2'));

    // }
    public function checkout()
    {
        $user = auth()->user();
        $cartProducts = cart_product::where(['user_id' => $user->id])->get();
        $i=0;
        foreach($cartProducts as $cp) {
            $p=Product::where(['id'=> $cp->product_id])->first();
            $il=$cartProducts[$i++];
            $il->name=$p->name;
        }

        return view('/checkout', compact('cartProducts'));

    }
}
