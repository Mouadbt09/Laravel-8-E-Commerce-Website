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

    <section class="product-main pt-5">
        <div class="container align-items-center m-auto">
                <div class="gallery d-none">
                    <img src="Img/Green hoodie in kid 2.webp" alt="">
                    <img src="Img/Green hooodie.webp" alt="">
                    <img src="Img/Green hoodie close.webp" alt="">
                </div>
                <div class="main-img">
                    <img src="{{ asset('image/' . $product->img1) }}"  alt="">
                </div>
                <div class="d-none d-md-block"></div>
                <div class="p-details">
                    <h2>{{ $product->name }}</h2>


                    <select name="cart_product_sizes" id="cart_product_sizes" onchange="setSize(this)" class="form-select w-auto">
                        @if($product->s3_mths_2_yrs != 0)
                            <option onclick="selectOption(this,'cart_product_size')" value="s3_mths_2_yrs">s3 mths - 2 yrs</option>
                        @endif
                        @if($product->s3_5_yrs != 0)
                            <option onclick="selectOption(this,'cart_product_size')" value="s3_5_yrs">s3-5 yrs</option>
                        @endif
                        @if($product->s6_9_yrs != 0)
                            <option onclick="selectOption(this,'cart_product_size')" value="$product->s6_9_yrs">s6-9 yrs</option>
                        @endif
                        @if($product->s10_16_yrs != 0)
                            <option onclick="selectOption(this,'cart_product_size')" value="s10_16_yrs">s10-16 yrs</option>
                        @endif
                    </select>
                    <p>
                        {{ $product->description }}
                    </p>
                        @if ($product->rprice!=0)
                           <span class="text-decoration-line-through text-muted">${{$product->rprice }}</span>&nbsp;&nbsp;
                        @endif
                        <span>${{ $product->price }}</span>
                    <p>
                        <button onclick="addtocart_fromP(this)" class="btn btn-outline-primary"><i class="bi-cart"></i> Add to cart</button>
                        <input type="hidden" value="{{$product->id}}">
                    </p>
                </div>
        </div>
    </section>

    <a href="/cart" class="my-cart btn btn-primary p-3">
        <i class="bi-cart-check text-white"></i>
    </a>
    <x-footer>
        {{-- {{ $slot }} --}}
    </x-footer>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('script.js') }}"></script>
    <script>
        function addtocart_fromP(e) {
            event.preventDefault();

            let mycart= document.querySelector('.my-cart');

            idv = e.parentNode.childNodes[3].value;
            size = document.querySelector('#cart_product_sizes').value;

            const xhr = new XMLHttpRequest();
            xhr.open('GET', `/addtocart_fromP/${idv}/${size}`, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                const response = JSON.parse(this.responseText);
                alert(response.message)
            }
            }
            xhr.send();
        }

    </script>
</body>
</html>
