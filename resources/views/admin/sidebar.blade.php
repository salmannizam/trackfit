        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('admin/img/user.png')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        {{-- <span>Admin</span> --}}
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('dashboard')}}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('product')}}" class="nav-item nav-link {{ Str::startsWith(request()->path(), 'Product') ? 'active' : '' }}" ><i class="fa fa-th me-2"></i>Products</a>
                    <a href="{{route('category')}}" class="nav-item nav-link {{ Str::startsWith(request()->path(), 'Category') ? 'active' : '' }}" ><i class="fa fa-keyboard me-2"></i>Category</a>           
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->