@extends('pannel')

@section('content')
<div class="container dash">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="my-5">Products</h1>
        <div class="filter">
            <form action="{{ route('search') }}" class="d-flex gap-2 align-content-center" method="post">@csrf
                <input type="text" class="form-control" placeholder="search" name="search">
                <button class="btn btn-outline-primary d-flex justify-content-center align-content-center"type="submit"><i class="bi-search"></i></button>
            </form>
        </div>

    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="table-responsive">
        <table class="table table-hover" style="max-height: 80vh">
            <thead class="text-white bg-dark">
                <tr>
                    <th scope="col"><h3 class="m-0">Image</h3></th>
                    <th scope="col"><h3 class="m-0">Name </h3></th>
                    <th scope="col"><h3 class="m-0">Price        </h3></th>
                    <th scope="col" class="d-none d-md-table-cell"><h3 class="m-0">Description  </h3></th>
                    <th scope="col"><h3 class="m-0">Actions      </h3></th>
                </tr>
            </thead>
            <tbody style="overflow-y: scroll">
                @foreach ($products as $product)
                <tr>
                    <td class="align-middle">
                        <div class="product-img-container text-center">
                            <img src="{{ asset('image/' . $product->img1) }}" alt="Product Image" class="mx-auto">
                        </div>
                    </td>
                    <td class="align-middle">{{ $product->name }}</td>
                    <td class="align-middle">${{ $product->price }}</td>
                    <td class="align-middle d-none d-md-table-cell">{{ $product->description }}</td>
                    <td class="align-middle">
                        <div class="action-buttons d-flex justify-content-between">
                            <a href="{{ route('panel.upd', ['id' => $product->id]) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <div class="container links d-flex justify-content-end">
        {!! $products->links() !!}
    </div>
</div>
@endsection
