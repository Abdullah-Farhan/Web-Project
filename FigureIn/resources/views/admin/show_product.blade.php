<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FigureIn Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .center{
          margin:auto;
          width:50%;
          text-align:center;
          margin-top:30px;
          border: 3px solid blueviolet;
        }
        .image{
            width: 200px;
            height: 200px;
        }
        td{
            padding:25px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include ('admin.sidebar')
      <!-- partial -->
      @include ('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))
                    <div class='alert alert-success'>
                        <button type="button" class='close' data-dismiss='alert' area-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                <h2 style='text-align: center; font-size: 40px;'>All Products</h2>

                <table class='center'>
                  <tr style='background-color:blueviolet;'>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Product Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>

                  @foreach ($product as $product)
                  <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount}}</td>
                    <td>
                        <img src="/product/{{$product->image}}" class='image'>
                    </td>
                    <td>
                        <a class='btn btn-danger' onclick="return confirm('Do you want to Delete?')" href="{{url('delete_product', $product->id)}}">Delete</a>
                    </td>
                    <td>
                        <a class='btn btn-success' href="{{url('update_product', $product->id)}}">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
                
            </div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>