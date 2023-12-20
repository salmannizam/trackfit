@include('admin.header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
       
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
                
            </div>
            <!-- Sale & Revenue End -->
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Add product</h6>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <form action="{{route('create_product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="bg-secondary rounded h-100 p-4 row">
                                
                                    <div class="form-floating mb-3 col-12">
                                        <input type="name" class="form-control" name="name" id="name"
                                            placeholder="Product name" value="{{ old('name') }}">
                                        <label for="floatingInput pl-2">Product Name</label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <input type="number" class="form-control" name="OriginalPrice" id="OriginalPrice"
                                            placeholder="Original Price" value="{{ old('OriginalPrice') }}">
                                        <label for="OriginalPrice">Original Price</label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <input type="number" class="form-control" name="OfferPrice" id="OfferPrice"
                                            placeholder="OfferPrice" value="{{ old('OfferPrice') }}">
                                        <label for="OfferPrice">Offer Price</label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <input type="number" class="form-control" name="quantity" id="quantity"
                                            placeholder="quantity" value="{{ old('quantity') }}">
                                        <label for="quantity">Quantity</label>
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <select class="form-select" id="category_id"
                                            aria-label=" select category" name="category_id">
                                            <option selected>Select category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                        <label for="category_id">category</label>
                                    </div>
                                    <div class="mb-3 col-6">               
                                        <input class="form-control form-control-lg bg-dark" multiple id="image" type="file" name="image[]">
                                    </div>
                                    <div class="form-floating mb-3 col-6">
                                        <select class="form-select" id="status"
                                            aria-label=" select Status" name="status">
                                            <option selected>Select Status</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="description" placeholder="Enter Description"
                                            id="description" style="height: 150px;">{{ old('description') }}</textarea>
                                        <label for="description">Description</label>
                                    </div>
        
                                    <div class="form-floating col-12 ">
                                        <button type="submit" class="btn btn-primary btn-lg">Add</button>
                                    </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('admin/js/main.js')}}"></script>
</body>

</html>