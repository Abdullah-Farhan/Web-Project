<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="home/favicon.jpg" type="image/x-icon">
    <title>Figure IN Store</title>

    <!-- Bootstrap core CSS -->
    <link href="home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

Figure IN Store

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="home/assets/css/fontawesome.css">
    <link rel="stylesheet" href="home/assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="home/assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    
    <!-- ***** Preloader End ***** -->

    @include('home.header')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <br><br>
    <div class="col-md-4" style='margin:auto; width:50%; padding:30px;'>
            <div class="product-item">
              <a href="{{url('product_details', $product->id)}}"><img src="product/{{$product->image}}" ></a>
              <div class="down-content">
                <a href="{{url('product_details', $product->id)}}"><h4>{{$product->title}}</h4></a>
                
                @if($product->discount != null)
                <h6 style='margin-right:5px;'>${{$product->price - $product->discount}}</h6>

                @else
                <h6>${{$product->price}}</h6>
                @endif

                @if($product->discount != null)
                <p style="color:red;">Discount: ${{$product->discount}} off</p>
                <p>Used to be <h5 style = 'color:red; text-decoration:line-through;'>${{$product->price}}</h5 ></p>

                @else
                <h6>${{$product->price}}</h6>
                @endif
                <ul class="stars">
                  <li><i style="color: rgb(106, 0, 206);" class="fa fa-star"></i></li>
                  <li><i style="color: rgb(106, 0, 206);" class="fa fa-star"></i></li>
                  <li><i style="color: rgb(106, 0, 206);" class="fa fa-star"></i></li>
                  <li><i style="color: rgb(106, 0, 206);" class="fa fa-star"></i></li>
                  <li><i style="color: rgb(106, 0, 206);" class="fa fa-star"></i></li>
                </ul>
                <span style="color: blueviolet;">Reviews (24)</span>
              </div>
            </div>
            <h5>Product Category : {{$product->category}}</h5><br>
            <h5>Description : {{$product->description}}</h5><br>

            <label>{{$product->quantity}} left</label><br><br>

            <form action="{{url('add_cart', $product->id)}}" method="POST">
                @csrf
                <div class='row'>
                    <div class='col-md-4' style='margin-right:3px;'>
                        <input type="number" name='quantity' value='1' min='1' max='{{$product->quantity    }}'>
                    </div>
                    <div class='col-md-2'></div>
                    <div class='col-md-4'>
                        <input type="submit" class='btn btn-primary' value='Add to Card'>
                    </div>
                </div>
            </form>
            
            
          </div>
    <!-- Banner Ends Here -->

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Figure IN Store</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for cool figures?</h4>
              <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">Our Store</a> is providing you some of the best prices. You can avail discounts by following us on our social media platforms. <a rel="nofollow" href="https://templatemo.com/contact">CONTACT</a> for more info.</p>
              <ul class="featured-list">
                <li><a href="#">Figure IN Store -  Instagram</a></li>
                <li><a href="#">Figure IN Store - Twitter</a></li>
                <li><a href="#">Figure IN Store - Facebook</a></li>
                <li><a href="#">Figure IN Store - Daraz</a></li>
                <li><a href="#">Figure IN Store - Savyour</a></li>
              </ul>
              <a href="about.html" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="home/assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Unique <em>Figures</em></h4>
                  <p>From your favorite animes</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2023 Figur IN Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://myanimelist.net/" target="_blank" style="color: blueviolet;">ANIME</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="home/vendor/jquery/jquery.min.js"></script>
    <script src="home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="home/assets/js/custom.js"></script>
    <script src="home/assets/js/owl.js"></script>
    <script src="home/assets/js/slick.js"></script>
    <script src="home/assets/js/isotope.js"></script>
    <script src="homeassets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
