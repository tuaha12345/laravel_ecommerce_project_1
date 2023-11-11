<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!--- font awesome link --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

        <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              
                @if (Route::has('login'))
            
                    @auth

                    <li class="nav-item">
                      <a class="nav-link" href="{{url('show_cart') }}"><i class="fa-solid fa-cart-shopping"></i><sup>{{ $count }}</sup></a>
                    </li>

                        {{-- -------------login --------------------- --}}
                   
                        <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                          </a>

                          
                              <a class=" text-light font-bold" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <div class="dropdown-menu  bg-danger text-center" aria-labelledby="navbarDropdown">
                                  {{ __('Logout') }}
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                  
                                  </form>
                                </div>                                    
                                 
                              </a>


                       </li>
                   
                        {{------------------- end of test ------------------}}
                    </li>    
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li> 
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>     
                        @endif
                    @endauth

                @endif
              
            </ul>
          </div>
        </div>
      </nav>

      @if(session()->has('message'))
      <div class="alert alert-warning alert-dismissible fade show text-center">
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
          {{ session()->get('message') }}
      </div>

      @endif

    </header>

 <!---------------------------------- table--------------------------------------------->
<br><br><br><br><br>



        <div class="text-content mt-5">
            <div class="container ">
                <h1 class="text-center fw-bold">Cart List</h1>
                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col">Order no</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        
                        <form method="post" action="{{ url('confirm_order') }}">
                          @csrf
                          <?php $num=1; ?>

                                  @foreach ($data as $d)
                                    
                                <tr>
                                    <th scope="row"><?php echo $num++; ?></th>
                                    <td>
                                       <input type="hidden" name="product_title[]" value="{{ $d->product_title }}">
                                      {{$d->product_title }}</td>
                                    <td>
                                      <input type="hidden" name="quantity[]" value="{{ $d->quantity }}">
                                      {{$d->quantity }}</td>
                                    <td>
                                      <input type="hidden" name="price[]" value="{{ $d->price }}">
                                      {{$d->price }}</td>
                                    <td>
                                      <a href="{{ url('delete_item',$d->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                                @endforeach
                                </tbody>
                            </table>

                            <div class="container">
                              <input type="submit" value="Confirm Order" class="btn btn-warning fw-bold" />
                            </div>

                        </form>
            </div>

 
        </div>



    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


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
