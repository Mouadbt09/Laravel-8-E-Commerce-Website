@extends('pannel')

@section('content')
<div class="container updater">
    <h1 class="my-5">Edit Offer</h1>
    <form method="POST" action="{{ route('offerup',$offer->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col-6">
                <label for="offer-name" class="form-label">Offer details</label>
                <input type="text" class="form-control"value="{{ $offer->offer }}" id="offer-name" placeholder="Enter offer description" name="offer-name">
            </div>
            <div class="mb-3 col-6">
                <label for="offerImage" class="onel form-label add-photo-label uploaded" id="photo-label2">
                  <img src="{{ asset('image/' . $offer->image) }}" id="offer-image" >
                </label>
                <input type="file" class="form-control" name="offreImage" id="offerImage" onchange="previewImage(event, 'offer-image', 'photo-label2')">
              </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="product-name" class="form-label">Product Name </label>
                <input type="text" class="form-control"value="{{ $product->name }}" id="product-name" placeholder="Enter product name"name="product-name">
            </div>
            <div class="mb-3 col-6 row">
                <div class="col-6">
                    <label for="product-rprice" class="form-label">Regular price </label>
                    <input type="number" class="form-control"value="{{ $product->rprice  }}" id="product-rprice" placeholder="Enter Regular price"name="product_rprice">
                </div>
                <div class="col-6">
                    <label for="product-price" class="form-label">Sale price</label>
                    <input type="number" class="form-control"value="{{ $product->price  }}" id="product-price" placeholder="Enter Sale price"name="product-price">
                </div>
            </div>
          </div>
          <div class="row">

            {{-- category --}}
            <div class="mb-3 col-6">
                <label for="product-category" class="form-label">Product category</label>
                <label for="product-category" class="form-label" style="display: block;opacity:0;">v</label>
                <select name="category" id="product-category" class="form-select">
                    <option onclick="selectOption(this)" value="T-Shirts" {{ $product->category == 'T-Shirts' ? 'selected' : '' }}>T-Shirts</option>
                    <option onclick="selectOption(this)" value="Trousers" {{ $product->category == 'Trousers' ? 'selected' : '' }}>Trousers</option>
                    <option onclick="selectOption(this)" value="Jackets" {{ $product->category == 'Jackets' ? 'selected' : '' }}>Jackets</option>
                    <option onclick="selectOption(this)" value="Footwear" {{ $product->category == 'Footwear' ? 'selected' : '' }}>Footwear</option>
                    <option onclick="selectOption(this)" value="Hoodies" {{ $product->category == 'Hoodies' ? 'selected' : '' }}>Hoodies</option>
                    <option onclick="selectOption(this)" value="Shorts" {{ $product->category == 'Shorts' ? 'selected' : '' }}>Shorts</option>
                </select>
                {{-- <select name="category" id="product-category" class="form-select" >
                    <option value="T-Shirts">T-Shirts</option>
                    <option value="Trousers">Trousers</option>
                    <option value="Jackets">Jackets</option>
                    <option value="Footwear">Footwear</option>
                    <option value="Hoodies">Hoodies</option>
                    <option value="Shorts">Shorts</option>
                </select> --}}
            </div>

            {{-- sizes --}}
            <div class="mb-3 col-6 row">
                <label for="" class="form-label col-12">Product sizes</label>
                <span class="sizes col-12">
                    <div>
                        <label for="s1">3mths-2 yrs</label>
                        <input value="{{ $product->s3_mths_2_yrs}}"name="s3_mths_2_yrs" type="number" class="form-control" name="s_3_mths_2_yrs" id="s1">
                    </div>
                    <div>
                        <label for="s2">3-5 yrs</label>
                        <input value="{{ $product->s3_5_yrs }}"name="s3_5_yrs" type="number" class="form-control" name="s_3_5_yrs" id="s2">
                    </div>
                    <div>
                        <label for="s3">6-9 yrs</label>
                        <input value="{{$product->s6_9_yrs}}"name="s6_9_yrs" type="number" class="form-control" name="s_6_9_yrs" id="s3">
                    </div>
                    <div>
                        <label for="s4">10-16 yrs</label>
                        <input value="{{$product->s10_16_yrs}}"name="s10_16_yrs" type="number" class="form-control" name="s_10_16_yrs" id="s4">
                    </div>
                </span>

            </div>

          </div>

            {{-- description --}}
            <div class="mb-3">
                <label for="product-description" class="form-label">Description</label>
                <textarea class="form-control"name="product-description" id="product-description" rows="3" placeholder="Enter product description">{{ $product->description }}</textarea>
            </div>
          <div class="row">
            {{-- colors --}}
            {{-- <div class="colors col-6">
                <label for="colors">Colors:</label>
                <div class="color-container">
                  <div class="color-item " style="display: grid;grid-template-columns:2fr 1fr;gap:10px;">
                    <input type="text" name="color-name[]" class="form-control" placeholder="Color Name" required>
                    <input type="color" name="color-code[]" class="form-control " required>
                  </div>
                </div>
                <button type="button" class="add-color btn btn-outline-secondary col-12">Add Color</button>
            </div> --}}
            {{-- imgs --}}
            <div class="row imgs col-6">
                <div class="mb-3 col-6 col-md-3 text-center">
                    <label for="product-imageo" class="form-label">
                        <img id="preview-imageo" src="{{ asset('image/' . $product->img1) }}" alt="">
                    </label>
                    <input type="file"name="product_imageo" class="form-control" id="product-imageo" onchange="previewImage(event, 'preview-imageo')">
                </div>
                {{-- <div class="mb-3 col-6 col-md-3 text-center">
                <label for="product-image2" class="form-label">
                    <img id="preview-image2" src="{{ asset('image/' . $product->img2) }}" alt="">
                </label>
                <input type="file" class="form-control" id="product-image2" onchange="previewImage(event, 'preview-image2')">
                </div>
                <div class="mb-3 col-6 col-md-3 text-center">
                <label for="product-image3" class="form-label">
                    <img id="preview-image3" src="{{ asset('image/' . $product->img3) }}" alt="">
                </label>
                <input type="file" class="form-control" id="product-image3" onchange="previewImage(event, 'preview-image3')">
                </div>
                <div class="mb-3 col-6 col-md-3 text-center">
                <label for="product-image4" class="form-label">
                    <img id="preview-image4" src="{{ asset('image/' . $product->img4) }}" alt="">
                </label>
                <input type="file" class="form-control" id="product-image4" onchange="previewImage(event, 'preview-image4')">
                </div> --}}
            </div>




            </div>
            {{-- actions --}}
          <div class="d-grid justify-content-between mt-5" style="grid-template-columns:  200px 1fr 200px; gap: 1rem;">
            <a href="{{ route('panel.dashp') }}" class="btn btn-outline-secondary">Cancel</a><div></div>
            <button class="btn btn-primary" type="submit">Update</button>
          </div>

    </form>
  </div>

<script>
    var offerImageInput = document.getElementById('offerImage');
    var newOfferImageInput = document.createElement('input');
    newOfferImageInput.type = 'file';
    newOfferImageInput.name = offerImageInput.name;
    newOfferImageInput.id = offerImageInput.id;
    newOfferImageInput.value = "{{ asset('image/' . $offer->image) }}";
    newOfferImageInput.className = offerImageInput.className;
    newOfferImageInput.onchange = offerImageInput.onchange;
    offerImageInput.parentNode.replaceChild(newOfferImageInput, offerImageInput);
  </script>
@endsection


