
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

 I       @include('admin.navbar')



        <div class="container-fluid page-body-wrapper ">
        <br><br><br><br><br><br><br><br><br><br>
        <div class=" mt-3  container">
        <h1 class="text-center mt-5">All Products</h1>

        @if(session()->has('message'))
        <div class="alert alert-danger alert-dismissible fade show">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session()->get('message') }}
        </div>

        @endif

        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">Sl.no</th>
                <th scope="col">Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $num=0 ?>
                @foreach ($data as $d)
                <?php $num=$num+1 ?>
              <tr>
                <th scope="row"><?php echo $num ?></th>
                <td>{{ $d->title }}</td>
                <td>{{ $d->quantity }}</td>
                <td>{{ $d->description }}</td>
                <td>{{ $d->price }}</td>
                <td><img src="/product_image/{{ $d->image }}" alt="" height="300" width="200"></td>
                <td>
                    <a type="button" class="btn btn-success" href="{{ url('edit_product',$d->id) }}">Edit</a>
                    <a type="button" class="btn btn-danger" href="{{ url('delete_product',$d->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
              </tr>

              @endforeach
              
            </tbody>
          </table>

        </div>

      </div> 
    </div>

@include('admin.script')
  </body>
</html>