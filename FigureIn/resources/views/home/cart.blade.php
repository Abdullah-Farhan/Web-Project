<!DOCTYPE html>
<html lang="en">

  <head>

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
    <style>
        th{
            padding:2-px;
        }
        td{
            padding:10px;
        }
        .image{
            width:185px;
            height:185px;
        }
        .spacing{
            margin:50px;
        }
    </style>
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <div>
    @include('home.header')
    </div>
    <br><br>
    <div class = 'spacing'>
    @if(session()->has('message'))
        <div class='alert alert-success'>
            <button type="button" class='close' data-dismiss='alert' area-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
    @endif
    </div>
    <center>
    <div>
        <table style='margin:50px; text-align:center;border: 3px solid black'>
            <tr style='background-color:blueviolet; font-size:30px;'>
                <th>Product Title</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php
                $totalprice=0;
            ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td>
                    <img src="/product/{{$cart->image}}" class='image'>
                </td>
                <td>
                    <a href="{{url('cart_remove_product', $cart->id)}}" class='btn btn-danger' onclick="return confirm('Are you sure to Remove?')">Remove</a>
                </td>
            </tr>
            <?php
                $totalprice=$totalprice+$cart->price;
            ?>
            @endforeach
        </table>
        <div>
            <h3>Total Price: ${{$totalprice}}</h3>
        </div>
        <div>
            <br><br>
            <h1>Proceed to Order</h1><br>
            <a href="{{url('cash_order')}}" class='btn btn-danger'>Cash on Delivery</a>
            <a href="{{url('stripe', $totalprice)}}" class='btn btn-danger'>Pay using Card</a>
        </div>

    </div>
</center>
    
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
