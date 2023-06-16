<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar  m-auto navbar-expand-lg bg-dark navbar-dark">
        {{-- <div class="position-absolute w-100 h-100 top-0 bg-primary"></div> --}}
        <div class="container-fluid">
          <a class="navbar-brand" href="/">MStore</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="/about" disabled>About</a>
                </li>
                @if(Auth::user())
                @if(Auth::user()->role==='ADMIN')
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="/panel">Espace Admin</a>
                    </li>
                @endif
                @endif
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a> --}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img style="width:24px;height:24px;border-radius: 100%" src="{{ asset('Img/avatar2.jpg') }}" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
          </div>
        </div>
    </nav>
    <div class="container-fluid dashp ">
        <div class="row">
            <div class="d-flex w-100 align-items-center justify-content-around d-md-none bg-dark">
                <p>
                    <i class="bi bi-house"></i>
                    <a class="nav-link text-white" href="{{ route('panel.dashp') }}">
                        &nbsp;Dashboard
                    </a>
                </p>
                <p>
                    <i class="bi bi-plus-square"></i>
                    <a class="nav-link text-white" href="{{ route('panel.add') }}">
                        Add Product
                    </a>
                </p>
                <p>
                    <i class="bi bi-card-text"></i>
                    <a class="nav-link text-white" href="{{ route('panel.offers') }}">
                        Offers
                    </a>
                </p>
                <p>
                    <i class="bi bi-bag"></i>
                    <a class="nav-link text-white" href="{{ route('panel.orders') }}">
                        Orders
                    </a>
                </p>
                @if(Request::url() == route('panel.dashp') || Request::is('dashboard/filterByCategory/*'))
                    <li class="nav-item d-flex align-items-center">
                        <div class="accordion" id="categoryAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="categoryHeaderl">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoryCollapsel" aria-expanded="false" aria-controls="categoryCollapse">
                                    <span class="d-flex gap-3 align-items-center">
                                        <i class="bi bi-funnel" style="opacity: 0;"></i>
                                        <a class="nav-link text-white" href="#">Category</a>
                                        <i class="bi bi-chevron-down"></i>
                                    </span>
                                </button>
                                </h2>
                                <div id="categoryCollapsel" class="accordion-collapse collapse" aria-labelledby="categoryHeader" data-parent="#categoryAccordion">
                                <div class="accordion-body p-0">
                                    <a href="{{ route('dashboard.filterByCategory', ['category' => 'T-Shirts']) }}" class="list-group-item list-group-item-action">T-Shirts</a>
                                    <a href="{{ route('dashboard.filterByCategory', ['category' => 'trousers']) }}" class="list-group-item list-group-item-action">Trousers</a>
                                    <a href="{{ route('dashboard.filterByCategory', ['category' => 'jackets']) }}" class="list-group-item list-group-item-action">Jackets</a>
                                    <a href="{{ route('dashboard.filterByCategory', ['category' => 'footwear']) }}" class="list-group-item list-group-item-action">Footwear</a>
                                    <a href="{{ route('dashboard.filterByCategory', ['category' => 'hoodies']) }}" class="list-group-item list-group-item-action">Hoodies</a>
                                    <a href="{{ route('dashboard.filterByCategory', ['category' => 'Shorts']) }}" class="list-group-item list-group-item-action">Shorts</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
            </div>
            <nav class="col-md-2 d-none d-md-flex bg-dark sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <p>
                                <i class="bi bi-house"></i>
                                <a class="nav-link text-white" href="{{ route('panel.dashp') }}">
                                    &nbsp;Dashboard
                                </a>
                            </p>
                            <p>
                                <i class="bi bi-plus-square"></i>
                                <a class="nav-link text-white" href="{{ route('panel.add') }}">
                                    Add Product
                                </a>
                            </p>
                            <p>
                                <i class="bi bi-card-text"></i>
                                <a class="nav-link text-white" href="{{ route('panel.offers') }}">
                                    Offers
                                </a>
                            </p>
                            <p>
                                <i class="bi bi-bag"></i>
                                <a class="nav-link text-white" href="{{ route('panel.orders') }}">
                                    Orders
                                </a>
                            </p>
                        </li>
                        @if(Request::url() == route('panel.dashp') || Request::is('dashboard/filterByCategory/*'))
                            <li class="nav-item">
                                <p>
                                    <i class="bi bi-funnel"></i>
                                    <span class="nav-link text-white">
                                        Filter By:
                                    </span>
                                </p>
                            </li>
                            <li>
                                <div class="accordion" id="categoryAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="categoryHeader">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#categoryCollapse" aria-expanded="false" aria-controls="categoryCollapse">
                                            <span class="d-flex gap-3 align-items-center">
                                                <i class="bi bi-funnel" style="opacity: 0;"></i>
                                                <a class="nav-link text-white" href="#">Category</a>
                                                <i class="bi bi-chevron-down"></i>
                                            </span>
                                        </button>
                                        </h2>
                                        <div id="categoryCollapse" class="accordion-collapse collapse" aria-labelledby="categoryHeader" data-parent="#categoryAccordion">
                                        <div class="accordion-body p-0">
                                            <a href="{{ route('dashboard.filterByCategory', ['category' => 'T-Shirts']) }}" class="list-group-item list-group-item-action">T-Shirts</a>
                                            <a href="{{ route('dashboard.filterByCategory', ['category' => 'trousers']) }}" class="list-group-item list-group-item-action">Trousers</a>
                                            <a href="{{ route('dashboard.filterByCategory', ['category' => 'jackets']) }}" class="list-group-item list-group-item-action">Jackets</a>
                                            <a href="{{ route('dashboard.filterByCategory', ['category' => 'footwear']) }}" class="list-group-item list-group-item-action">Footwear</a>
                                            <a href="{{ route('dashboard.filterByCategory', ['category' => 'hoodies']) }}" class="list-group-item list-group-item-action">Hoodies</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content')

            </main>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>

