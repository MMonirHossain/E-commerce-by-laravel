<!DOCTYPE html>
<html>
  <head>     @include('admin.css')  </head>
  <body>

    @include('admin.header') 
      
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Product</h2>
            <div style="float:right; ">
                <a  class="btn btn-sm btn-info" href="{{route('admin_product.index')}}">Back</a>
            </div>
          </div>
          
        </div>

        <!-- Body Section start -->


        <section class="no-padding-bottom">
            <div style="background-color: #2D3035; padding:15px; margin-bottom: 20px;">
                <div class="container-fluid">
                    <h2 class="text-center">{{$product->title}}</h2>
                    <img  width="80%" src="{{asset('storage/'.$product->image)}}" alt="">
                    <p>Price: {{$product->price}}, Quantity: {{$product->quantity}}, Category: {{$product->category_id}}</p>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </section>



        <!-- Body Section End-->

        @include('admin.footer')
      </div>
    </div>

    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>
