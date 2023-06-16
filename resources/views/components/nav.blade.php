<nav class="navbar container m-auto navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">MStore</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent">
        {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">À Propos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">T-Shirts</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Trousers</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Jackets</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Footwear</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Hoodies</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Age
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">3mths-2 yrs</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">3-5 yrs</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">6-9 yrs</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">10-16 yrs</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">link</a>
          </li>
        </ul> --}}
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link" href="/about" disabled>About</a>
            </li>
            @if(Auth::user())
            @if(Auth::user()->role==='ADMIN')
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="/panel">Admin Panel</a>
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
                    <div class="dropdown-menu dropdown-menu-end w-25 mb-2 " aria-labelledby="navbarDropdown">
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

        <form class="d-flex" action="{{ route('product.search') }}" method="GET">
            <input class="form-control me-2" type="search" name="term" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </div>
</nav>
