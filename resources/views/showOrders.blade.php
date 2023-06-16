@extends('pannel')

@section('content')
<div class="container dash">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="my-5">Orders</h1>
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
                    <th scope="col"><h3 class="m-0">id</h3></th>
                    <th scope="col"><h3 class="m-0">full user name </h3></th>
                    <th scope="col"><h3 class="m-0">email      </h3></th>
                    <th scope="col"><h3 class="m-0">country</h3></th>
                    <th scope="col"><h3 class="m-0">city </h3></th>
                    <th scope="col"><h3 class="m-0">address      </h3></th>
                    <th scope="col"><h3 class="m-0">code postal      </h3></th>
                    <th scope="col"><h3 class="m-0">total price      </h3></th>
                    <th scope="col"><h3 class="m-0">validate</h3></th>
                </tr>
            </thead>
            <tbody style="overflow-y: scroll">
                @foreach ($orders as $order)
                <tr>
                    <td class="align-middle">{{ $order->id }}</td>
                    <td class="align-middle">{{ $order->f_name }}</td>
                    <td class="align-middle">{{ $order->email }}</td>
                    <td class="align-middle">{{ $order->country }}</td>
                    <td class="align-middle">{{ $order->city }}</td>
                    <td class="align-middle">{{ $order->address }}</td>
                    <td class="align-middle">{{ $order->code_postal }}</td>
                    <td class="align-middle">{{ $order->total_price  }}</td>
                    <td class="align-middle">
                        <div class="action-buttons d-flex justify-content-between">
                            <form action="{{ route('destroyOrder', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-success"><i class="bi bi-check"></i></button>
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
        {!! $orders->links() !!}
    </div>
</div>
@endsection
