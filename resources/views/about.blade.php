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
    <section class="">
        <div class="container mx-auto py-5">
            <h2 class="mt-3">About Mstore</h2>
            <p>
                Welcome to MStore, the go-to destination for high-quality clothing for boys at affordable prices. Our mission is to provide families with access to comfortable, stylish clothing that will help their children explore the world with confidence.

                We pride ourselves on ethical sourcing, timeless styles, and durable materials. We carefully select factories around the world that prioritize fair wages, safe working conditions, and environmental sustainability. Our in-house team of designers and buyers work closely together to create wearable outfits that boys will love, no matter what new adventure they're exploring that day.

                We offer a wide selection of clothing essentials and on-trend pieces made from organic cotton, recycled polyester, and other eco-friendly fabrics that are designed to last through every stage of a child's growth. We also provide free shipping and returns on all orders and offer excellent customer service that's available 24/7.

                Our commitment to ethical consumption and sustainability goes beyond selling clothes. With every purchase, you're supporting a business dedicated to making the world a brighter place for future generations.
            </p>
            <h2 class="mt-3">
                Privacy Policy
            </h2>
            <p>
                At MStore, we value your privacy and are committed to protecting your personal information. We only collect necessary information, such as your name, email, password, and contact information when creating an account or making a purchase. We never sell your personal information to third parties.

                We use cookies and pixels to improve site functionality, remember account login information, track aggregate analytics, and measure advertising effectiveness. We also collect payment information, which we encrypt and store securely with our trusted payment processor.

                You can modify or request to have your data deleted at any time by contacting our Privacy team at privacy@mystore.com.
            </p>
            <h2 class="mt-3">
                Terms and Conditions
            </h2>
            <p>
                Please review our terms and conditions carefully before using our website. By accessing or using our website, you agree to be bound by the terms and conditions outlined below. <br>
                Intellectual Property: All content on our website, including text, graphics, logos, images, and software, is the property of MStore and is protected by copyright laws. You may not use, modify, or distribute any of our content without our written consent.
            </p>
            <h2 class="mt-3">
                Product Availability
            </h2>
            <p>
                We strive to keep our website up-to-date with accurate product information and availability. However, we cannot guarantee that all products will be in stock at all times.
            </p>
            <h2 class="mt-3">Pricing</h2>
            <p>
                MStore reserves the right to change prices on the website at any time without prior notice. The prices listed on the website may not be accurate, and MStore may cancel orders if the price listed on the website is incorrect.
            </p>
            <h2 class="mt-3">
                Payment
            </h2>
            <p>
                MStore accepts all major credit cards and uses a trusted payment processor to ensure secure transactions. Payment information is encrypted and stored securely.
            </p>
            <h2 class="mt-3">Shipping</h2>
            <p>
                MStore offers free shipping on all orders. Orders are typically processed within 1-2 business days and shipped via standard shipping. Expedited shipping options are available for an additional fee.
            </p>
            <h2 class="mt-3">
                Returns
            </h2>
            <p>
                MStore offers free returns on all orders. If you're not satisfied with your purchase, you can return it within 30 days for a full refund.
            </p>
            <h2 class="mt-3">
                Contact Us
            </h2>

            <div class="row">
                <p class="col-8">
                    We're always here to help! If you have any questions, order issues, product feedback, or suggestions, please don't hesitate to contact us. You can reach our customer service team via email at service@mystore.com or by phone at (555) 555-5555 Monday - Friday from 9am - 6pm EST.
                </p>
                <p class="col-4">
                    MStore
                    123 Main Street
                    Anytown, USA 12345
                </p>
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
