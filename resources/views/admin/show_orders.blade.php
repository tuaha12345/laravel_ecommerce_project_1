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

      @include('admin.sidebar')
      <!-- partial -->
       <div class="container-fluid page-body-wrapper">
 I       @include('admin.navbar')



 {{-- -------------------------------- table----------------------------- --}}
        <div class="container-fluid page-body-wrapper my-5 mx-5">
            <div class="container text-center table-responsive">
                <table class="table text-light">
                    <thead>
                      <tr>
                        <th scope="col">Sl no.</th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Product title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $num=1; ?>
                        @foreach ($order as $data)
                            
                      <tr>
                        <th scope="row"><?php echo $num++; ?></th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->product_title }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            <a href="{{url('update_status',$data->id)}}" class="btn btn-primary">Delivered</a>
                            {{-- <a href="{{'update_status',$data->id}}" class="btn btn-primary">Delivered</a> --}}
                        </td>
                      </tr>

                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>



 {{-- -------------------------------- table----------------------------- --}}

      </div> 
    </div>
    <!--  (########@@@@@ -----------------SCRIPT---------- @@@@@############################)-->
@include('admin.script')
  </body>
</html>