<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('adminend/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        
        <ul class="list-unstyled">
                <li class="{{(Request::is('admin')?'active':'')}}"><a href="{{route('admin.dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li class="{{(Request::is('admin_category')?'active':'')}}"><a href="{{route('admin.category.get')}}"> <i class="fa fa-light fa-list"></i>Category </a></li>
                <li class="{{(Request::is('admin_product')?'active':'')}}"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{route('admin.add_product')}}">Add Products</a></li>
                    <li><a href="{{route('admin_product.index')}}">All Products</a></li>
                    <li><a href="#">Trashed Product</a></li>
                  </ul>
                </li>
                
        </ul><span class="heading">Extras</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Setting </a></li>
        </ul>
      </nav>