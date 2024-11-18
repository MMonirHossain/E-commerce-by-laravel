<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        .paginator nav{
            background-color:#ffffff;
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <section class="h-100">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0">My Shopping Cart</h3>
          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price 
              <i class="fa fa-angle-down mt-1"></i></a></p>
          </div>
        </div>

        <?php $total_price=0;?>

        @foreach($carts as $cart)
                  
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img height="62px" widht="62px"
                    src="{{asset('storage/'.$cart->product->image)}}"
                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2">{{$cart->product->title}}</p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fa fa-minus"></i>
                  </button>

                  <input id="form1" min="0" max="{{$cart->product->quantity}}" name="quantity" value="1" type="number"
                    class="form-control form-control-sm" />

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">${{$cart->product->price}}</h5>
                  <?php $total_price +=$cart->product->price; ?>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="#" class="text-danger">
                  <i class="fa fa-trash fa-lg" style="widht:16px;height: 16px;" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach



        <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" placeholder="Discound code"/>
              
            </div>
            <button  type="button" class="btn btn-outline-secondary btn-lg ms-3">Apply</button>
          </div>
        </div>



        <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
            <p class="lead fw-normal mb-2">Discount</p>
            </div>
            <p class="lead fw-bold mb-2">$45</p>
          </div>

          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <h3>Total</h2>
            </div>
            <h3>${{$total_price}}</h2>
          </div>
        </div>


        <div class="card">
          <div class="card-body">
            <button  type="button" class="btn btn-block btn-lg" style="background-color:#dc3545;color:white;">Proceed to Pay</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>



  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->


  @include('home.js')

</body>

</html>