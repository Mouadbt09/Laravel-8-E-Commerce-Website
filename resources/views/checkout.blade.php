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

    <section class="container-fluid">
        <div class="container min-vh-100 pt-md-5">
            <div class="row mb-md-5">
                    <form action="/pay" method="POST" class="col-12 col-md-7">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2 class="my-4">Billing details</h2>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country" id="country" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="country">City</label>
                                <input type="text" class="form-control" name="city" id="city" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="address">Street address</label>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="country">Code Postal</label>
                                <input type="text" class="form-control" name="code_postal" id="city" required>
                            </div>
                        </div>
                        @php
                                $i=0;
                                foreach ($cartProducts as $cp) {
                                    $i+=$cp->price;
                                }
                                echo '<input name="total_price" type="hidden" value="'.$i.'">';
                        @endphp

                        <div class="row">
                            <div class="form-group col-12 mt-1">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-primary">valid order and Proceed Checkout</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12 col-md-5 pr-md-4">
                            <h2 class="my-4">Your order</h2>
                        <div class="d-flex justify-content-between border-bottom">
                            <h5>Product</h5>
                            <h5>Subtotal</h5>
                        </div>
                        @foreach($cartProducts as $product)
                            <div class="d-flex justify-content-between my-2">
                                <span class="m-0 d-flex gap-1 justify-content-start w-auto">
                                    {{ $product->name }} × <strong>{{ $product->quantity }}</strong>
                                    <p class="m-0">({{ $product->size }})</p>
                                </span>
                                <p class="m-0">${{ $product->price }}</p>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between  align-content-end border-top">
                            <h5 class="m-0"><strong>Total</strong></h5>
                            <h5 class="m-0" ><strong id="total_checkout">$
                            @php
                                $i=0;
                                foreach ($cartProducts as $cp) {
                                    $i+=$cp->price;
                                }
                                echo $i;
                            @endphp
                            </strong></h5>
                        </div>
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
