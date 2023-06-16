<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>MStore</title>
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body onload="setprice()">
<header class="bg-primary container-fluid">
    <x-nav>
        {{-- {{ $slot }} --}}
    </x-nav>
</header>

@if (count($list) > 0)
        <!-- Display cart products here -->
        <div class="container py-5 min-vh-100 mx-auto">
            <h1>Shopping Cart</h1>
            <div class="row w-100 mx-auto">
                <div class="col-12 col-md-8 col-lg-9 p-0 p-md-2">
                    @foreach($list as $product)
                        <div class="c_product border-bottom w-100 d-flex justify-content-between align-items-center p-2">
                        <img src="{{ asset('image/' . $product->img1) }}"class="rounded" alt="${{ $product->image }}">
                        <p>{{ $product->name }}</p>
                        <select name="cart_product_size" id="cart_product_size_cart" onchange="setSize(this)">
                            <option onclick="selectOption2(this)" value="s3_mths_2_yrs" {{ $product->size == 's3_mths_2_yrs' ? 'selected' : '' }}>3mths-2 yrs</option>
                            <option onclick="selectOption2(this)" value="s3_5_yrs" {{ $product->size == 's3_5_yrs' ? 'selected' : '' }}>3-5 yrs</option>
                            <option onclick="selectOption2(this)" value="s6_9_yrs" {{ $product->size == 's6_9_yrs' ? 'selected' : '' }}>6-9 yrs</option>
                            <option onclick="selectOption2(this)" value="s10_16_yrs" {{ $product->size == 's10_16_yrs' ? 'selected' : '' }}>10-16 yrs</option>
                        </select>
                        <div class="quantity" data-product-id="{{ $product->product_id }}">
                        <button class=" text-secondary minus">-</button>
                        <input type="text" disabled name="quantity" id="quantity" value="{{ $product->quantity }}" class="qty-text">
                        <button class=" text-secondary plus">+</button>
                        </div>
                        <p >$<span class="pprice">{{ $product->price }}</span></p>
                        <a href="#" onclick="deletefromcart({{ $product->product_id }})"><i class="bi bi-x"></i></a>
                        <input type="hidden"class="initial_price">
                        <input type="hidden"class="product_id" value="{{ $product->product_id }}">
                        </div>
                    @endforeach
                </div>
                <div class="hidden md-d-block col-1"></div>
                <div class="hidden col-12 md-d-block col-md-3 col-lg-2 p-0 position-relative text-dark bg-dark rounded-2 pay">
                    <h3 class="text-secondary text-center p-2">
                        Payment details
                    </h3>
                    <div class="w-75  mx-auto text-white ">
                       <h5>
                        <strong class="d-block">
                            Total products:
                       </strong>
                       </h5>
                       <p class="d-inline">{{ count($list) }}</p>&nbsp; Products
                       <h5>
                        <strong class="d-block mt-3">
                            Total Price:
                        </strong>
                       </h5>
                        <span>$<p class="d-inline total_price1"></p></span>
                    </div>
                    <a href="checkout" class="position-absolute rounded-bottom bg-secondary border-0 font-weight-bold text-white bottom-0 w-100 text-decoration-none py-3 d-flex align-items-center justify-content-center gap-1">
                        CONTINUE TO CHECKOUT
                        <svg viewBox="0 -4.5 20 20" width="13" height="13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#f8f8f8" transform="rotate(90)" stroke="#f8f8f8"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_up [#f8f8f8]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -6684.000000)" fill="#f8f8f8"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M223.707692,6534.63378 L223.707692,6534.63378 C224.097436,6534.22888 224.097436,6533.57338 223.707692,6533.16951 L215.444127,6524.60657 C214.66364,6523.79781 213.397472,6523.79781 212.616986,6524.60657 L204.29246,6533.23165 C203.906714,6533.6324 203.901717,6534.27962 204.282467,6534.68555 C204.671211,6535.10081 205.31179,6535.10495 205.70653,6534.69695 L213.323521,6526.80297 C213.714264,6526.39807 214.346848,6526.39807 214.737591,6526.80297 L222.294621,6534.63378 C222.684365,6535.03868 223.317949,6535.03868 223.707692,6534.63378" id="arrow_up-[#f8f8f8]"> </path> </g> </g> </g> </g></svg>
                    </a>
                </div>

            </div>
            <div class="w-100 col-9 d-flex align-items-center  justify-content-between c_back my-2">
                <a class="d-flex align-items-center text-center" href="products">
                    <svg viewBox="0 0 1024 1024"width="2à"height="20" fill="#0d6efd" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#0d6efd"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M669.6 849.6c8.8 8 22.4 7.2 30.4-1.6s7.2-22.4-1.6-30.4l-309.6-280c-8-7.2-8-17.6 0-24.8l309.6-270.4c8.8-8 9.6-21.6 2.4-30.4-8-8.8-21.6-9.6-30.4-2.4L360.8 480.8c-27.2 24-28 64-0.8 88.8l309.6 280z" fill=""></path></g></svg>
                    <p class="m-0 p-0">Continue shoping</p>
                </a>
                <p>
                    Total <span>$<strong class="total_price2"></strong></span>
                </p>
            </div>
        </div>
    @else
        <!-- Display message for empty cart -->
        <main class="container Cart-cont d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-primary">Your Cart</h1>
            <p>Nothing here</p>
            <small><a href="products">Go back </a> to shop page to choose your product</small>

        </main>
@endif


<x-footer>
{{-- {{ $slot }} --}}
</x-footer>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>
