<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\Product;
use Illuminate\Http\Request;

class offerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        if ($image1 = $request->file('product_imageo')){
            if ($imageo = $request->file('offreImage')) {
                $destinationPath = 'image/';
                $imageName1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
                $image1->move($destinationPath, $imageName1);
                $product = new Product();
                $product->name = $request->input('product-name');
                $product->price = $request->input('product-price');
                $product->description = $request->input('product-description');
                $product->category = $request->input('category');
                $product->s3_mths_2_yrs = $request->input('s3_mths_2_yrs');
                $product->s3_5_yrs = $request->input('s3_5_yrs');
                $product->s6_9_yrs = $request->input('s6_9_yrs');
                $product->s10_16_yrs = $request->input('s10_16_yrs');
                $product->rprice = $request->input('product_rprice');
                $product->img1 = $imageName1;
                $product->img2 = "imageName2";
                $product->img3 = "imageName3";
                $product->img4 = "imageName4";
                $product->save();

                $destinationPath = 'image/';
                $imageNameo = date('YmdHis') . "." . $imageo->getClientOriginalExtension();
                $imageo->move($destinationPath, $imageNameo);
                $offer = offer::findOrFail($id);
                $offer->image = $imageNameo;
                $offer->offer = $request->input('offer-name');
                $offer->p_id = $product->id;
                $offer->save();

                return redirect('/panel/dashp')->with('success', 'offer updated');
            }
            else {
                $destinationPath = 'image/';
                $imageName1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
                $image1->move($destinationPath, $imageName1);
                $product = new Product();
                $product->name = $request->input('product-name');
                $product->price = $request->input('product-price');
                $product->description = $request->input('product-description');
                $product->category = $request->input('category');
                $product->s3_mths_2_yrs = $request->input('s3_mths_2_yrs');
                $product->s3_5_yrs = $request->input('s3_5_yrs');
                $product->s6_9_yrs = $request->input('s6_9_yrs');
                $product->s10_16_yrs = $request->input('s10_16_yrs');
                $product->rprice = $request->input('product_rprice');
                $product->img1 = $imageName1;
                $product->img2 = "imageName2";
                $product->img3 = "imageName3";
                $product->img4 = "imageName4";
                $product->save();

                $offer = offer::findOrFail($id);
                $offer->offer = $request->input('offer-name');
                $offer->p_id = $product->id;
                $offer->save();

                return redirect('/panel/dashp')->with('success', 'offer updated');
            }
        }
        else {
            return redirect('/panel/dashp')->with('success', 'update product image please and try again');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = offer::findOrFail($id);
        $idp=$offer->p_id;
        $product = Product::findOrFail($idp);
        return view('addOffer', [
            'offer' => $offer,
            'product' => $product
        ]);
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
        $offer = offer::findOrFail($id);
        $offer->delete();
        return redirect('/panel/dashp')->with('success', 'offer has been deleted successfully!');
    }
}
