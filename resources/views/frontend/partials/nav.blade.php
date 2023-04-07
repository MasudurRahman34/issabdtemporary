<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    {{-- style="background-color:#6bb77d!important;" --}}
    {{-- <img src="{{ asset('images/rakhal_250_100.png') }}" alt=""> --}}
    <a class="navbar-brand theme-bg-color p-2 text-light rounded-1" href="{{ route('index') }}">
      ISSHABD.COM
      {{-- <img src="{{ asset('images/rakhal_250_100.png') }}" alt=""> --}}
    </a>
    {{-- <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <form class="container-fluid form-inline" action="{!! route('search') !!}" method="get">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary search-icon-button" type="button"><i class="fa fa-search"></i></button>
            </div>
          </div>

        </form>
      </li>
    </ul> --}}
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item nav-link">Call For Order 01609150700</li>
        
        {{-- <li class="nav-item {{ Route::is('index') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
        </li> --}}
        {{-- <li class="nav-item  {{ Route::is('products') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('products') }}">Products</a>
        </li> --}}
        {{-- <li class="nav-item  {{ Route::is('contact') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li> --}}
        {{-- <div class="dropdown">
          <a class="btn btn-outline-success border border-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> 
            login
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             @guest
              <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
             @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">
                  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                  <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                    My dashboard
                  </a>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
           @endguest
          </ul>
        </div> --}}

      </ul>
    </div>
      <ul class="navbar-nav ml-auto">
        <li>
          <a class="nav-link btn-cart-nav" href="{{ route('carts') }}">
  
            <button class="btn btn-outline-success">
              <span class="mt-1">Cart</span>
              <span class="badge badge-warning" id="totalItems" style="font-size: 1rem;">
                {{ App\Models\Cart::totalItems() }}
              </span>
            </button>
  
          </a>
        </li>
      </ul>
</div>
</nav>
<!-- End Navbar Part -->
