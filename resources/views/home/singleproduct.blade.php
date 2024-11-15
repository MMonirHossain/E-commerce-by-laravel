<!DOCTYPE html>
<html>

<head>
    @include('home.css')

<style>
    .product{background-color: #eee}
    .product a{color:#dc3545;}
    .brand{font-size: 13px}
    .act-price{color:#dc3545;font-weight: 700}
    .dis-price{text-decoration: line-through;}
    .about{font-size: 14px}
    .color{margin-bottom:10px}
    label.radio{cursor: pointer}
    label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}
    label.radio span{
        padding: 2px 9px;
        border: 2px solid #dc3545;
        display: inline-block;
        color: #dc3545;
        border-radius: 3px;
        text-transform: uppercase}
    label.radio input:checked+span{border-color: #dc3545;background-color: #dc3545;color: #fff}
    .btn-danger{background-color: #dc3545 !important;border-color: #dc3545 !important}
    .btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}
    .btn-danger:focus{box-shadow: none}
    .cart i{margin-right: 10px}
</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
        @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->



  <div class="container mt-5 mb-5">
    <div class="row d-flex">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="{{asset('storage/'.$product->image)}}" width="250px" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="{{asset('storage/'.$product->image)}}" width="70px"> <img onclick="change_image(this)" src="{{asset('storage/'.$product->image)}}" width="70"> </div>
                        </div>
                    </div>
                    <div class="col-md-6 product">
                        <div class=" p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <a href="{{route('home')}}"><i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span></a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> 
                                <h5 class="text-uppercase">{{$product->title}}</h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">${{$product->price-$product->price*40/100}}</span>
                                    <div class="ml-2"> <small class="dis-price">${{$product->price}}</small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about">{{$product->description}}</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div>
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>

  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->

  <script>
    function change_image(image){
        var container = document.getElementById("main-image");
        container.src = image.src;
    }
        document.addEventListener("DOMContentLoaded", function(event) {});
  </script>

  @include('home.js')

</body>

</html>