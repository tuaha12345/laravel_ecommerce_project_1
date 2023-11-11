<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
            {{-- <form action="url{{ 'search'}}" class="d-flex my-5 w-30" role="search" method="GET" >
              @csrf
              <input class="form-control me-2 " type="search" placeholder="Search" name="search">
              <button class="btn" type="submit" >🔍</button>
            </form> --}}

            <form action="{{ route('product.search') }}" method="GET">
              @csrf
              <input type="text" name="search" placeholder="Search products" >
              <button type="submit" class="btn">🔍</button>
          </form>

          
          </div>
        </div>

        <!-------- div for product image-------->
        @foreach ($data as $product)
          
        
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="/product_image/{{ $product->image }}" alt="" height="300" width="200"></a>
            <div class="down-content">
              <a href="#"><h4>{{ $product->title }}</h4></a>
              <h6>{{ $product->price }}/-</h6>
              <p>{{ $product->description }}</p>
              
              <form method="POST" action="{{ url('add_to_cart',$product->id) }}">
                @csrf
                Quantity: <input type="number" name="quantity" style="width: 100px;"><br>
                <input href="#" class="bg-primary text-light border-0 rounded p-2 my-3" type="submit" value="Add to cart">

              </form>
              
            </div>
          </div>
        </div>
        @endforeach


        @if(method_exists($data,'links'))
       <div class="container d-flex justify-content-center">
         {{-- {{ $data->links() }} --}}
        
         {{ $data->onEachSide(5)->links() }}
         
       </div>
         @endif



    
        <!-------- end of div------------->

      </div>
    </div>
  </div>