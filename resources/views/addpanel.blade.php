@extends('pannel')

@section('content')
<div class="container updater">
    <h1 class="my-5">Add Product</h1>
    <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="mb-3 col-6">
            <label for="product-name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product-name" placeholder="Enter product name" name="product-name">
        </div>
        <div class="mb-3 col-6">
            <label for="product-price" class="form-label">Price</label>
            <input type="number" class="form-control" id="product-price" placeholder="Enter product price" name="product-price">
        </div>
      </div>
      <div class="row">

        {{-- category --}}
        <div class="mb-3 col-6">
            <label for="product-category" class="form-label">Product category</label>
            <label for="product-category" class="form-label" style="display: block;opacity:0;">v</label>
            <select name="category" id="product-category" class="form-select" >
                <option value="T-Shirts">T-Shirts</option>
                <option value="Trousers">Trousers</option>
                <option value="Jackets">Jackets</option>
                <option value="Footwear">Footwear</option>
                <option value="Hoodies">Hoodies</option>
                <option value="Shorts">Shorts</option>
            </select>
        </div>

        {{-- sizes --}}
        <div class="mb-3 col-6 row">
            <label for="" class="form-label col-12">Product sizes</label>
            <span class="sizes col-12">
                <div>
                    <label for="s1">3mths-2 yrs  </label>
                    <input type="number" class="form-control" id="s1" name="s3_mths_2_yrs">
                </div>
                <div>
                    <label for="s2">3-5 yrs      </label>
                    <input type="number" class="form-control" id="s2" name="s3_5_yrs">
                </div>
                <div>
                    <label for="s3">6-9 yrs        </label>
                    <input type="number" class="form-control" id="s3" name="s6_9_yrs">
                </div>
                <div>
                    <label for="s4">10-16 yrs     </label>
                    <input type="number" class="form-control"  id="s4" name="s10_16_yrs">
                </div>

            </span>

        </div>

      </div>

        {{-- description --}}
      <div class="mb-3">
        <label for="product-description" class="form-label">Description</label>
        <textarea name="product-description"class="form-control" id="product-description" rows="3" placeholder="Enter product description"></textarea>
      </div>
      <div class="row">
        {{-- colors --}}
        {{-- <div class="colors col-6">
            <label for="colors">Colors:</label>
            <div class="color-container">
              <div class="color-item " style="display: grid;grid-template-columns:2fr 1fr;gap:10px;">
                <input type="text" name="color-name[]" class="form-control" placeholder="Color Name">
                <input type="color" name="color-code[]" class="form-control " required>
              </div>
            </div>
            <button type="button" class="add-color btn btn-outline-secondary col-12">Add Color</button>
        </div> --}}


          <div class="row imgs col-6">
            <div class="mb-3 col-6 col-md-3">
                <label for="product-image1" class="onel form-label add-photo-label" id="add-photo-label1">
                    <img alt="" id="preview-image1" >
                </label>
                <input type="file" class="form-control"name="product-image1" id="product-image1" onchange="previewImage(event, 'preview-image1', 'add-photo-label1')">
                {{-- <small class="text-dark p-1 border-bottom">Main picture</small> --}}
            </div>
            {{-- <div class="mb-3 col-6 col-md-3 text-center">
                <label for="product-image2" class="form-label add-photo-label" id="add-photo-label2">
                    <img alt="" id="preview-image2" >
                </label>
                <input type="file" class="form-control" id="product-image2"name="product-image2" onchange="previewImage(event, 'preview-image2', 'add-photo-label2')">
            </div>
            <div class="mb-3 col-6 col-md-3 text-center">
                <label for="product-image3" class="form-label add-photo-label" id="add-photo-label3">
                    <img alt="" id="preview-image3">
                </label>
                <input type="file" class="form-control" id="product-image3"name="product-image3" onchange="previewImage(event, 'preview-image3', 'add-photo-label3')">
            </div>
            <div class="mb-3 col-6 col-md-3 text-center">
                <label for="product-image4" class="form-label add-photo-label" id="add-photo-label4">
                    <img alt="" id="preview-image4">
                </label>
                <input type="file" class="form-control" id="product-image4" name="product-image4" onchange="previewImage(event, 'preview-image4', 'add-photo-label4')">
            </div> --}}
            </div>
        </div>



        {{-- actions --}}
      <div class="d-grid justify-content-between mt-5" style="grid-template-columns:  200px 1fr 200px; gap: 1rem;">
        <a href="{{ route('panel.dashp') }}" class="btn btn-outline-secondary">Cancel</a><div></div>
        <button class="btn btn-primary" type="submit">Add</button>
      </div>

    </form>
  </div>
@endsection


