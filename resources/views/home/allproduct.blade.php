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

  <section class="shop_section layout_padding">
    <div class="container">      
      <div class="row">

      @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="{{route('single_product',$product->id)}}">
              <div class="img-box">
                <img src="{{asset('storage/'.$product->image)}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$product->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    ${{$product->price}}
                  </span>
                </h6>
              </div>
              </a>
          </div>
        </div>
      @endforeach
      </div>

         <div class ="paginator" style="display:flex;justify-content:center;align-items:center;margin-top:30px;">
                 {{$products->links()}}
        </div>
      
    </div>
  </section>


   

  <!-- info section -->
    @include('home.footer')
  <!-- end info section -->


  @include('home.js')

</body>

</html>