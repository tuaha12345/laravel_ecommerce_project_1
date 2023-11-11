{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>

  <body>

    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- ############################# @@@@@@@@@@@@ SIDEBAR######################@@@@@@@@@@@@ -->
      @include('admin.sidebar')
      <!-- partial -->
       
        <!-- partial:partials/_navbar.html (########@@@@@ NAVBAR @@@@@############################)-->
 I       @include('admin.navbar')
        <!-- partial -->
        <!--  (########@@@@@ Main @@@@@############################)-->
        <div class="container-fluid page-body-wrapper ">

        <br><br><br><br><br><br><br><br><br><br>
        <div class=" mt-3  container">
        <h1 class="text-center mt-5">Add Product</h1>
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session()->get('message') }}
        </div>

        @endif

        <form action="/upload_product" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3 ">
              <label  class="form-label">Product Title:</label><br>
              <input type="text" class="form-control w-50 text-light" name="title" required>
            </div>
            <div class="mb-3 ">
                <label  class="form-label">Price:</label><br>
                <input type="text" class="form-control w-50 text-light" name="price" required>
              </div>
              <div class="mb-3 ">
                <label  class="form-label">Product Description:</label><br>
                <input type="text" class="form-control w-50 text-light" name="description" required>
              </div>
              <div class="mb-3 ">
                <label  class="form-label">Quantity:</label><br>
                <input type="text" class="form-control w-50 text-light" name="quantity" required>
              </div>   
              <div class="mb-3 ">
                <label  class="form-label">Product Image:</label><br>
                <input type="file" class="form-control w-50 text-light" name="product_image" required>
              </div>            
            <button type="submit" class="btn btn-success">Submit</button>
          </form>








        </div>

        <!-- main  ends -->
      </div> 
      <!-- page-body-wrapper ends -->
    </div>
    <!--  (########@@@@@ -----------------SCRIPT---------- @@@@@############################)-->
@include('admin.script')
  </body>
</html>