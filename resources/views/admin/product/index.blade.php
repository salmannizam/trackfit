@include('admin.header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.sidebar')
        <!-- Sidebar End -->
        
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
         
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{asset('admin/img/user.png')}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="{{route('logout')}}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Active Product</p>
                                <h6 class="mb-0">{{$active_products}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Product</p>
                                <h6 class="mb-0">{{$total_products}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Product</h6>
                        <a href="{{route('add_product')}}">Add Product</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Image</th>
                                    <th scope="col">name</th>
                                    <th scope="col">slug</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">OriginalPrice</th>
                                    <th scope="col">OfferPrice</th>
                                    <th scope="col">category_id</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            @if ($product->image)
                                                @php
                                                    $product_images = json_decode($product->image);
                                                @endphp
                                
                                                @forelse ($product_images as $image)
                                                    <img src="{{ asset('admin/product_image/' . $image) }}" alt="Product Image" width="50px">
                                                @empty
                                                    No Image
                                                @endforelse
                                            @endif
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->slug}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->OriginalPrice}}</td>
                                        <td>{{$product->OfferPrice}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>
                                            @if($product->status)
                                            <a class="btn btn-sm btn-success me-2" href="">Live</a>
                                             @else
                                            <a class="btn btn-sm btn-warning" href="">Pending</a>
                                            @endif
                                        </td>
                                        
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-warning me-2" href="{{route('edit_product',$product->id)}}">Edit</a>
                                            <form action="{{route('delete_product',$product->id)}}" method="POST">
                                                @csrf
                                                <input  class="btn btn-sm btn-danger me-2" type="submit" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                   <td colspan="9"> No record found.</td>
                                </tr>
                                    
                                @endforelse
                                <tr>
                                    <td colspan="9" class="text-center">{{$products->links()}}</td>
                                 </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    @include('admin.footer')