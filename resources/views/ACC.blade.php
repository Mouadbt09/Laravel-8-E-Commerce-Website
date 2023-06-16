<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MStore</title>
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="bg-primary container-fluid">
        <x-nav>
            {{-- {{ $slot }} --}}
        </x-nav>
    </header>

    @if(session('success'))
    <div class="position-fixed top-0 w-100 d-flex justify-content-center p-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif



    <section class="landing d-flex align-items-center pt-5 pt-md-0">
        <div class="row container mx-auto">
            <div class=" col-md-6 d-flex flex-column justify-content-center container">
                <h1>Best outfit for your <i>Boy</i></h1>
                <h4>
                    from basic essentials to the latest trends, all at affordable prices that fit your budget.
                    Our big selection guarantees you'll find just the right outfit to help him explore his world in comfort and style!
                </h4>
                <div class="p-0 my-5">
                <button class="btn btn-lg btn-primary shop-now d-flex align-items-center">
                    <a class="text-white" href="/products">Shop Now</a> <i class="bi-arrow-right"></i>
                </button>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center  align-items-end">
                <img src="{{ asset('Img/bg.png') }}" alt="">
            </div>
        </div>
    </section>

    <section class="container services py-5" style="background: none !important">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 my-2 my-md-0 gap-3 gap-md-0 justify-content-start">
                    <i class="bi-truck text-primary"></i>
                    <span>
                        <h3>Free Shipping</h3>
                        <small class="text-muted">Free shepping on all order</small>
                    </span>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-2 my-md-0 gap-3 gap-md-0 justify-content-center">
                    <i class="bi-cash-coin text-primary"></i>
                    <span>
                        <h3>Best Prices</h3>
                        <small class="text-muted">Get best price</small>
                    </span>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-2 my-md-0 gap-3 gap-md-0 justify-content-center">
                    <i class="bi-person-video3 text-primary"></i>
                    <span>
                        <h3>Online Support 24/7</h3>
                        <small class="text-muted">Technical support 24/7</small>
                    </span>
                </div>
                <div class="col-12 col-md-6 col-lg-3 my-2 my-md-0 gap-3 gap-md-0 justify-content-end">
                    <i class="bi-shield-check text-primary"></i>
                    <span>
                        <h3>Secure Payment</h3>
                        <small class="text-muted">All cards accepted</small>
                    </span>
                </div>
            </div>
    </section>

    <h2 class="text-center  title" id="p">Best Offers</h2><hr>
    <span class="d-none">{{ $i=1 }}</span>

    <section class="offers container">
        @foreach($offers as $offer)
            <div class="offerimg{{ $i++ }}">
                <div class="o"></div>
                <img src="{{ asset('image/'.$offer->image) }}" alt="">
                <span class="offerLink d-flex justify-content-center align-items-end flex-column">
                    <h2 class="text-end ">{{ $offer->offer }}</h2>
                    <a href="/products/{{ $offer->p_id }}" class="btn btn-light">Shop Now</a>
                </span>
            </div>
        @endforeach
    </section>

    <section class="py-5 product container-fluid">
        <div class="container">
            <h2 class="text-center  title" id="p">Newest Additions</h2><hr>
            <div class="row justify-content-center p-list">

                @foreach($products as $product)
                    <div class="m-3 card bg-ligth p-2 text-start border-bottom-primary">
                        <a href="/products/{{ $product->id }}">
                            <img class="card-img-top" src="{{ asset('image/' . $product->img1) }}" alt="product">
                        </a>
                        <a href="/products/{{ $product->id }}" class="mt-1 text-dark">{{ $product->name }}</a>
                        <div class="d-flex justify-content-between align-items-center">
                            <span>${{ $product->price }}</span>
                        </div>
                        <div class="d-flex justify-content-between gap-1">
                            <a href="/products/{{ $product->id }}" class="btn btn-outline-primary flex-grow-1" style="width: 70%;">Details</a>
                            <input type="hidden" name="product_idc" value={{$product->id}}>
                            <a href=""   class="btn btn-outline-primary bi bi-cart-plus" style="width: 28%;" onclick="addtocart(this)"style="cursor:pointer"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- categories --}}
    <section class="py-5  container-fluid">
        <div class="container">
            <h2 class="text-center title" id="p">Shop by category</h2><hr>
            <div class="categories_section d-md-grid w-100 py-5 gap-5 text-white">
                <div class="rounded-4 position-relative pb-1">
                    <div class="o position-absolute w-100 bottom-0 h-75 rounded-4 bg-primary"></div>
                    <strong class="position-relative overflow-hidden rounded-4 d-block mx-4">
                        <img class="position-absolute w-100 h-100 top-0 rounded-4" src="{{ asset('Img/Footwear.jpg') }}" alt="">
                    </strong>
                    <span class="d-flex justify-content-between mt-5 mx-4 position-relative">
                        <p href="" class="m-0 font-weight-bolder">Footwear</p>
                        <a href="/filterBycat/Footwear" class="btn btn-light py-2 px-3 rounded-3 ">Discover</a>
                    </span>
                </div>
                <div class="rounded-4 position-relative pb-1">
                    <div class="o position-absolute w-100 bottom-0 h-75 rounded-4 bg-primary"></div>
                    <strong class="position-relative overflow-hidden rounded-4 d-block mx-3">
                        <img class="position-absolute w-100 h-100 top-0 rounded-4" src="{{ asset('Img/T-shirts.jpg') }}" alt="">
                    </strong>
                    <span class="d-flex justify-content-between mt-5 mx-3 position-relative">
                        <p href="" class="m-0 font-weight-bolder">T-shirts</p>
                        <a href="/filterBycat/T-shirts" class="btn btn-light py-2 px-3 rounded-3 ">Discover</a>
                    </span>
                </div>
                <div class="rounded-4 position-relative pb-1">
                    <div class="o position-absolute w-100 bottom-0 h-75 rounded-4 bg-primary"></div>
                    <strong class="position-relative overflow-hidden rounded-4 d-block mx-4">
                        <img class="position-absolute w-100 h-100 top-0 rounded-4" src="{{ asset('Img/Jackets.jpg') }}" alt="">
                    </strong>
                    <span class="d-flex justify-content-between mt-5 mb-1 mx-4 position-relative">
                        <p href="" class="m-0 font-weight-bolder">Jackets</p>
                        <a href="/filterBycat/Jackets" class="btn btn-light py-2 px-3 rounded-3 ">Discover</a>
                    </span>
                </div>
                <div class="rounded-4 position-relative py-2">
                    <div class="o position-absolute w-100 bottom-0 h-75 rounded-4 bg-primary"></div>
                    <strong class="position-relative overflow-hidden rounded-4 d-block mx-4">
                        <img class="position-absolute w-100 h-100 top-0 rounded-4" src="{{ asset('Img/Trousers.jpg') }}" alt="">
                    </strong>
                    <span class="d-flex justify-content-between mt-5 mx-4 position-relative">
                        <p href="" class="m-0 font-weight-bolder">Trousers</p>
                        <a href="/filterBycat/Trousers" class="btn btn-light py-2 px-3 rounded-3 ">Discover</a>
                    </span>
                </div>
                <div class="rounded-4 position-relative py-2">
                    <div class="o position-absolute w-100 bottom-0 h-75 rounded-4 bg-primary"></div>
                    <strong class="position-relative overflow-hidden rounded-4 d-block mx-4">
                        <img class="position-absolute w-100 h-100 top-0 rounded-4" src="{{ asset('Img/Hoodies.jpg') }}" alt="">
                    </strong>
                    <span class="d-flex justify-content-between mt-5 mx-4 position-relative">
                        <p href="" class="m-0 font-weight-bolder">Hoodies</p>
                        <a href="/filterBycat/Hoodies" class="btn btn-light py-2 mb-2 px-3 rounded-3 ">Discover</a>
                    </span>
                </div>
                <div class="rounded-4 position-relative py-2">
                    <div class="o position-absolute w-100 bottom-0 h-75 rounded-4 bg-primary"></div>
                    <strong class="position-relative overflow-hidden rounded-4 d-block mx-4">
                        <img class="position-absolute w-100 h-100 top-0 rounded-4" src="{{ asset('Img/Shorts.jpg') }}" alt="">
                    </strong>
                    <span class="d-flex justify-content-between mt-5 mx-4 position-relative">
                        <p href="" class="m-0 font-weight-bolder">Shorts</p>
                        <a href="/filterBycat/Shorts" class="btn btn-light py-2 mb-2 px-3 rounded-3 ">Discover</a>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <a href="cart" class="my-cart btn btn-primary p-3">
        <i class="bi-cart-check text-white"></i>
    </a>
    <x-footer>
        {{-- {{ $slot }} --}}
    </x-footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="script.js"></script>
</body>
</html>
