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
        label{
            display:inline-block;
            width:200px;
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
                <div class="main-panel">
                @if(session()->has('message'))
                    <div class='alert alert-success'>
                        <button type="button" class='close' data-dismiss='alert' area-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                    <div style='text-align:canter;padding-top:40px;'>
                            <center><h2 style='font-size:40px; margin-bottom:40px;'>Add Product</h2>
                            <form action='{{url("/add_product")}}' method='POST' enctype='multipart/form-data'>

                                @csrf
                                <label for="">Product Title </label>
                                <input style='color:black;' type="text" name="title" placeholder='Write a Title' required>
                                <br><br>
                                <label for="">Product Description </label>
                                <input style='color:black;' type="text" name="description" placeholder='Write Product Description' required>
                                <br><br>
                                <label for="">Product Price </label>
                                <input style='color:black;' type="number" name="price" placeholder='Enter Product Price' min="0" required>
                                <br><br>
                                <label for="">Product Quantity </label>
                                <input style='color:black;' type="number" name="quantity" placeholder='Enter Product Quantity' min="0" required>
                                <br><br>
                                <label for="">Discount Price </label>
                                <input style='color:black;' type="number" name="discount" placeholder='Enter Discount Price' min="0">
                                <br><br>
                                <label for="">Product Category </label>
                                <select name="category" style='color:black;' required>
                                    <option value="" selected=''>Add a Category</option>
                                    @foreach ($category as $category)
                                    
                                    <option value='{{$category->category_name}}'>{{$category->category_name}}</option>
                                    
                                    @endforeach
                                </select>
                                <br><br>
                                <label for="">Product Image </label>
                                <input style='color:white;' type="file" name="image" required accept='.jpg, .jpeg'>
                                <br><br>
                                <input type="submit" class='btn bth-dark' name='submit' value='Add Product'>

                            </form>
                            </center>
                        </div>
                </div>
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