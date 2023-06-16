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

    <section class="shop container ">
        <h2 class="title d-flex justify-content-between d-md-none mt-3" >Filter
            <i class="bi-filter" id="filter-drop" data-bs-toggle="collapse" data-bs-target="#filter-aside"></i>
        </h2>
        <hr class="d-block d-md-none">
        <aside class="py-md-5 collapse d-md-block" id="filter-aside">
        <h2 class="title d-none d-md-flex justify-content-between align-items-center" id="p"><p class="m-0 p-0">Filter</p><a href="/products"id="clear" class="d-none">Clear All</a></h2>
        <hr class="d-none d-md-block">
            <form action="">
                    <div class="form-group">
                        <label for="minp">Slect min price:</label>
                        <input type="range" min="5" max="2805" step="10" id="minp" onchange="changemin(this)" value="5">
                    </div>
                    <div class="form-group">
                        <label for="maxp">Slect max price:</label>
                        <input type="range" min="20" max="3000" step="10" id="maxp" onchange="changemax(this)" value="3000">
                    </div>
                    <div class="d-flex gap-2">
                        <div class="form-group">
                            <label for="minpin">Min:</label>
                            <input type="number" id="minpin" class="form-control" onchange="changemin(this)" value="5">
                        </div>
                        <div class="form-group">
                            <label for="maxpin">Max:</label>
                            <input type="number" id="maxpin" class="form-control" onchange="changemax(this)"value="3000">
                        </div>
                    </div>
                    <div id="priceDisplay"></div>
                    {{-- priceDisplay.innerHTML = "Price: $" + min + " - $" + value; --}}
            </form>
            <form action="#">
                <label for="category" class="mt-3">Select Category</label>
                <select name="category" id="category" class="form-select" onchange="f()">
                <option value="T-Shirts" disabled selected>Choose Category</option>
                <option value="T-Shirts">T-Shirts</option>
                <option value="Trousers">Trousers</option>
                <option value="Jackets">Jackets</option>
                <option value="Footwear">Footwear</option>
                <option value="Hoodies">Hoodies</option>
                <option value="Shorts">Shorts</option>
                </select>
            </form>
    </aside>

        <main class="py-5 product">
                <div class="md-container">
                <h2 class="title d-flex justify-content-between px-md-4" id="p"><p class="m-0">Products</p> </h2><hr>
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
                            <a href="" onclick="addtocart(this)" class="btn btn-outline-primary bi bi-cart-plus" style="width: 28%;"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </main>
    </section>
    <div class="container d-flex justify-content-end pg">
        {!! $products->links() !!}
    </div>

    <a href="/cart" class="my-cart btn btn-primary p-3">
        <i class="bi-cart-check text-white"></i>
    </a>
  <x-footer>
    {{-- {{ $slot }} --}}
</x-footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
