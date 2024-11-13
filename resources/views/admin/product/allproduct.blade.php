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
            <h2 class="h5 no-margin-bottom">All Product</h2>
          </div>
        </div>

        <!-- Body Section start -->


        <section class="no-padding-bottom">
            <div style="background-color: #2D3035; padding:15px; margin-bottom: 20px;">
                <div class="container-fluid">
                
                <form class="form-inline my-2 my-lg-2" method="GET" action="{{route('admin_product.search')}}">
                  @csrf
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                @if($products->isEmpty())
                  <h2>No Product Found!</h2>
                @else

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Image</th>
                      <th scope="col">Price</th>
                      <th scope="col">Category</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    

                    @foreach ($products as $product)
                    <tr>
                      <th scope="row">{{$product->id}}</th>
                      <td>{{$product->title}}</td>
                      <td>{{ Str::words($product->description, 20, '...') }}</td>
                      <td>
                        <img src="{{asset('storage/'.$product->image)}}" alt="" width="100px" height="50px">
                      </td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->category_id}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>
                          <a href="{{route('admin_product.show',$product->id)}}" class="btn btn-sm btn-info">View</a><br>
                          <a href="{{route('admin_product.edit',$product->id)}}" class="btn btn-sm btn-secondary">Edit</a><br>
                          <form action="{{route('admin_product.destroy',$product->id)}}" method="POST" >
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                          </form>
                      </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <div style="display:flex;justify-content:center;align-items:center;margin-top:30px;">
                 {{$products->links()}}
                </div>
                @endif

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
