<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\Product;
use Illuminate\Http\Request;

class PController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->paginate(10);
        return view('/shop',compact('products'));
    }

    public function home()
    {
        $products=Product::latest()->paginate(12);
        $offers=offer::latest()->paginate(4);
        return view('ACC',compact('products','offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function filterByCategory($category)
    {
        $products = Product::where('category', $category)->paginate(100000);
        return response()->json(compact('products'));
    }

    public function filterByCategory2($category)
    {
        $products = Product::where('category', $category)->paginate(10);
        return view('/shop',compact('products'));
    }

    public function filterByPriceRange($minprice, $maxprice)
    {
        $products = Product::whereBetween('price', [$minprice, $maxprice])->paginate(100000);
        return response()->json(compact('products'));
    }

    public function search(Request $request) {
        $searchTerm = $request->input('term');
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')->orWhere('description', 'like', '%' . $searchTerm . '%')->paginate(10);
        return view('/shop',compact('products'));
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
