<div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('Dashboard')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Category')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Category
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Product')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Sale.list')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Sale
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Order.list')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Order List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Stock')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Stock
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Customer.list')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Customer
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Account
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Admin
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Report')}}">
                <svg class="bi"><use xlink:href="#graph-up"/></svg>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Brand')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Brand
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Business Setup
              </a>
            </li>
            
            
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <svg class="bi"><use xlink:href="#plus-circle"/></svg>
            </a>
          </h6>
          <ul class="nav flex-column mb-auto">
            
            
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('logout')}}">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out
              </a>
            </li>
          </ul>
        </div>