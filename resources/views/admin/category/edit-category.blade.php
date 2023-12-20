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
            
            <!-- Sale & Revenue End -->
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Update Category</h6>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{$error}}</p>
                            @endforeach
                        @endif
                        <form action="{{route('update_category',$category->id)}}" method="POST">
                            @csrf
                        <div class="bg-secondary rounded h-100 p-4 row">
                            
                                <div class="form-floating mb-3 col-6">
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Product name" value="{{$category->name}}" name="name">
                                    <label for="name pl-2">Category Name</label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <input type="text" class="form-control" id="slug"
                                        placeholder="Product slug" name="slug" value="{{$category->slug}}">
                                    <label for="slug pl-2"> Slug</label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <select class="form-select" id="status"
                                        aria-label=" select Status" name="status">
                                        <option selected>Select Status</option>
                                        <option value="0" {{($category->status == '0')?"selected":""}}>Inactive</option>
                                        <option value="1" {{($category->status == '1')?"selected":""}}>Active</option>
                                    </select>
                                    <label for="status">Status</label>
                                </div>
                                <div class="form-floating mb-3 col-6">
                                    <textarea class="form-control" name="description" placeholder="Enter Description"
                                        id="description" style="height: 150px;">{{$category->slug}}</textarea>
                                    <label for="description">Description</label>
                                </div>
    
                                <div class="form-floating col-12 ">
                                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
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

    @include('admin.footer')