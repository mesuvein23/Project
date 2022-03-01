<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          {{ config('app.name', 'Laravel') }}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? 'active':''}} ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories') ? 'active':''}} ">
            <a class="nav-link" href="{{url('categories')}}">
              <i class="material-icons">person</i>
              <p>Categories</p>
            </a>
          </li>

          <li class="nav-item {{Request::is('add-category') ? 'active':''}} ">
            <a class="nav-link" href="{{url('add-category')}}">
              <i class="material-icons">person</i>
              <p>Add-Category</p>
            </a>
          </li>

          <li class="nav-item {{ Request::is('products') ? 'active':''}} ">
            <a class="nav-link" href="{{url('products')}}">
              <i class="material-icons">person</i>
              <p>Products</p>
            </a>
          </li>

          <li class="nav-item {{Request::is('add-products') ? 'active':''}} ">
            <a class="nav-link" href="{{url('add-products')}}">
              <i class="material-icons">person</i>
              <p>Add-Products</p>
            </a>
          </li>

          <li class="nav-item {{ Request::is('orders') ? 'active':''}} ">
            <a class="nav-link" href="{{url('orders')}}">
              <i class="material-icons">person</i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('users') ? 'active':''}} ">
            <a class="nav-link" href="{{url('users')}}">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('materials') ? 'active':''}} ">
            <a class="nav-link" href="{{url('materials')}}">
              <i class="material-icons">person</i>
              <p>Materials</p>
            </a>
          </li>

          <li class="nav-item {{Request::is('add-materials') ? 'active':''}} ">
            <a class="nav-link" href="{{url('add-materials')}}">
              <i class="material-icons">person</i>
              <p>Add-Materials</p>
            </a>
          </li>
         
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>