<!-- Header -->
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><h2>Figure <em style="color: blueviolet;">IN</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">HOME
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{url('products')}}">PRODUCTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">ABOUT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">CONTACT</a>
              </li>

              @if (Route::has('login'))

                    @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('cart')}}">CART</a>
                  </li>
                    <li class="nav-item">
                      <a href="{{url('logout')}}" class='btn btn-primary'>LOG OUT</a>
                    </li>

                    @else
                        <li class="nav-item">
                          <a class="btn btn-light" href="{{ route('login') }}">LOG IN</a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-dark" href="{{ route('register') }}">REGISTER</a>
                        </li>

                    @endauth

              @endif

            </ul>
          </div>
        </div>
      </nav>
    </header>