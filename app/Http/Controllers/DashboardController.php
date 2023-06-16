<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\ordermodel;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect('/panel/dashp');
    }
    public function add()
    {
        return view('addpanel');
    }
    public function offer()
    {
        $offers = offer::latest()->paginate(4);
        return view('showOffer', compact('offers'));
    }
    public function order()
    {
        $orders = ordermodel::latest()->paginate(20);
        return view('showOrders', compact('orders'));
    }
    public function upd(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        return view('uppannel', [
            'product' => $product
        ]);
    }

    public function dashp()
    {
        $products = Product::latest()->paginate(20);
        return view('dashpanel', compact('products'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/panel/dashp')->with('success', 'Product has been deleted successfully!');
    }

    public function destroyOrder($id)
    {
        $product = ordermodel::findOrFail($id);
        $product->delete();
        return redirect('/panel/dashp')->with('success', 'Order has been deleted successfully!');
    }

    public function addProduct(Request $request)
{
    $input = $request->all();
    $imageName1 = '';
    $imageName2 = '';
    $imageName3 = '';
    $imageName4 = '';

    // Upload image 1
    if ($image1 = $request->file('product-image1')) {
        $destinationPath = 'image/';
        $imageName1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
        $image1->move($destinationPath, $imageName1);
    }

    // // Upload image 2
    // if ($image2 = $request->file('product-image2')) {
    //     $destinationPath = 'image/';
    //     $imageName2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
    //     $image2->move($destinationPath, $imageName2);
    // }

    // // Upload image 3
    // if ($image3 = $request->file('product-image3')) {
    //     $destinationPath = 'image/';
    //     $imageName3 = date('YmdHis') . "." . $image3->getClientOriginalExtension();
    //     $image3->move($destinationPath, $imageName3);
    // }

    // // Upload image 4
    // if ($image4 = $request->file('product-image4')) {
    //     $destinationPath = 'image/';
    //     $imageName4 = date('YmdHis') . "." . $image4->getClientOriginalExtension();
    //     $image4->move($destinationPath, $imageName4);
    // }

    $product = new Product();
    $product->name = $request->input('product-name');
    $product->price = $request->input('product-price');
    $product->description = $request->input('product-description');
    $product->category = $request->input('category');
    $product->s3_mths_2_yrs = $request->input('s3_mths_2_yrs');
    $product->s3_5_yrs = $request->input('s3_5_yrs');
    $product->s6_9_yrs = $request->input('s6_9_yrs');
    $product->s10_16_yrs = $request->input('s10_16_yrs');
    $product->img1 = $imageName1;
    $product->img2 = "imageName2";
    $product->img3 = "imageName3";
    $product->img4 = "imageName4";


    $product->save();

    return redirect('/panel/dashp')->with('success','Product created successfully.');
}

public function upProduct(Request $request,$id)
{
    $input = $request->all();
    $imageName1 = '';
    $imageName2 = '';
    $imageName3 = '';
    $imageName4 = '';

    // Upload image 1
    if ($image1 = $request->file('product-image1')) {
        $destinationPath = 'image/';
        $imageName1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
        $image1->move($destinationPath, $imageName1);
    }

    // // Upload image 2
    // if ($image2 = $request->file('product-image2')) {
    //     $destinationPath = 'image/';
    //     $imageName2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
    //     $image2->move($destinationPath, $imageName2);
    // }

    // // Upload image 3
    // if ($image3 = $request->file('product-image3')) {
    //     $destinationPath = 'image/';
    //     $imageName3 = date('YmdHis') . "." . $image3->getClientOriginalExtension();
    //     $image3->move($destinationPath, $imageName3);
    // }

    // // Upload image 4
    // if ($image4 = $request->file('product-image4')) {
    //     $destinationPath = 'image/';
    //     $imageName4 = date('YmdHis') . "." . $image4->getClientOriginalExtension();
    //     $image4->move($destinationPath, $imageName4);
    // }

    $product = Product::findOrFail($id);
    $product->name = $request->input('product-name');
    $product->price = $request->input('product-price');
    $product->description = $request->input('product-description');
    $product->category = $request->input('category');
    $product->s3_mths_2_yrs = $request->input('s3_mths_2_yrs');
    $product->s3_5_yrs = $request->input('s3_5_yrs');
    $product->s6_9_yrs = $request->input('s6_9_yrs');
    $product->s10_16_yrs = $request->input('s10_16_yrs');
    if ($image1 = $request->file('product-image1')) {
        $product->img1 = $imageName1;
    }else{
        $product->img1=$product->img1;
    }
    // $product->img1 = $imageName1;
    $product->img2 = "imageName2";
    $product->img3 = "imageName3";
    $product->img4 = "imageName4";


    $product->save();

    return redirect('/panel/dashp')->with('success','Product uppdated successfully');
}



public function search(Request $request)
{
    $products = Product::query();

    // Check if a search query was submitted
    if ($request->has('search')) {
        $searchQuery = $request->input('search');
        $products->where(function ($query) use ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%')
                  ->orWhere('description', 'like', '%' . $searchQuery . '%');
        });
    }

    // Get the paginated list of products
    $products = $products->paginate(10);

    // Render the view with the list of products
    return view('dashpanel', compact('products'));
}

public function filterByCategory($category)
{
    $products = Product::where('category', $category)->paginate(10);
    return view('dashpanel', compact('products'));
}











}


