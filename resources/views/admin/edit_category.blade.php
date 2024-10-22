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
            <h2 class="h5 no-margin-bottom">Category</h2>
          </div>
        </div>

        <!-- Body Section start -->
        <section class="no-padding-top no-padding-bottom">
            <div style="background-color: #2D3035; padding:15px; margin-bottom: 20px;">
                <div class="container-fluid">
                    <form action="{{route('admin.category.update',$category->id)}}" method="POST">
                        @csrf                    
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach               
                        @endif

                        <div class="form-group">
                            <label>Edit Category</label>
                            <input type="text" name = "category_name" class="form-control" value="{{$category->category_name}}">
                        </div>
                        
                        <input type="submit" value="Edit Category" class="btn btn-primary">
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
