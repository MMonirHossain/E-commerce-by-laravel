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
                    <form action="{{route('admin.category.post')}}" method="POST">
                        @csrf
                        
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach               
                        @endif

                        <div class="form-group">
                            <label>Add Category</label>
                            <input type="text" name = "category_name" class="form-control">
                        </div>
                        
                        <input type="submit" value="Add Category" class="btn btn-primary">
                    </form> 
                </div>
            </div>
        </section>

        <section class="no-padding-bottom">
            <div style="background-color: #2D3035; padding:15px; margin-bottom: 20px;">
                <div class="container-fluid">
                  <h2 class="text-center">Manage Category</h2>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($categories as $category)
                    <tr>
                      <th scope="row">{{$category->id}}</th>
                      <td>{{$category->category_name}}</td>
                      <td>
                          <a href="{{route('admin.category.put',$category->id)}}" class="btn btn-sm btn-info">Edit</a>
                      </td>
                      <td>
                          <a  href="{{url('delete_category',$category->id)}}" class="btn btn-sm btn-danger">DELETE</a>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
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
