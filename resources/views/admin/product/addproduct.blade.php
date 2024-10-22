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
          </div>
        </div>

        <!-- Body Section start -->
        <section class="no-padding-top no-padding-bottom">
            <div style="background-color: #2D3035; padding:15px; margin-bottom: 20px;">
                <div class="container-fluid">
                    <form action="" method="POST">
                        @csrf
                        
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach               
                        @endif

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name = "title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name = "description" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name = "image" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name = "price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" name = "category_id" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name = "quantity" class="form-control">
                        </div>

                        <input type="submit" value="Add Product" class="btn btn-primary">
                    </form> 
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
