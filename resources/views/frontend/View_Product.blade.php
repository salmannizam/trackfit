@include('frontend.header')
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
		
		<!-- End Hero Section -->

		
        <!-- Start Contact Form -->
        <div class="untree_co-section">
          <div class="container">

            <div class="block">
              <div class="text-dark text-center mb-5 font-weight-bold  t"></div>
              <div class="row justify-content-center shadow-lg bg-light p-lg-5 p-3 rounded  mb-3 mb-lg-5">
                <div class="col-lg-6 pb-4  ">
                  <div class="card">
                    @if ($Product->image)
                      @php
                          $product_images = json_decode($Product->image,);
                      @endphp
                      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                              @forelse ($product_images as $index => $image)
                                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                              @empty
                                  No Image
                              @endforelse
                        </div>
                        <div class="carousel-inner">
                              @forelse ($product_images as $index => $image)
                                  <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                                      <img src="{{ asset('admin/product_image/' . $image) }}" class="d-block w-100" alt="Product Image">
                                  </div>
                              @empty
                                  <div class="carousel-item">
                                      No Image
                                  </div>
                              @endforelse
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    @endif
                      
                  </div>
                </div> 
                  <div class="col-lg-6 mb-5  text-md-start  text-center ps-md-4 ps-0 ">
                    <div class="">
                      <h3 class="text-dark my-3 mb-5">{{$Product->name}} </h3>
                      {{-- <p class="fw-bolder text-dark mb-1 mb-lg-5">{$Product->description}</p> --}}
                      <p class="price  text-dark fw-bolder lead my-3"> ₹ {{$Product->OfferPrice}}</p>
                        <!-- Button trigger modal -->
                      <button type="button" class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Enquiry
                      </button>               
                    </div>
                      <p class=" fw-bold text-black mt-4">
                        <span class="fw-bolder lead "> Description: </span> {{$Product->description}}
                      </p>
                  </div>    
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
           
              <!-- Modal -->
              <div class="modal fade pt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Enquiry form</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                          <form action="{{route('Equiry_Product',$Product->id)}}" method="POST">
                            @csrf
                            <div class="row">
                              <div class="col-12 mb-3">
                                <div class="form-group text-start">
                                  <label class="text-black" for="fname" >Name</label>
                                  <input type="text" class="form-control" name="name" id="fname">
                                </div>
                              </div>
                              <div class="col-12 ms-auto mb-3">
                                <div class="form-group text-start">
                                  <label class="text-black" for="email">Email address</label>
                                  <input type="email" class="form-control"  name="email" id="email">
                                </div>
                              </div>
                              <div class="col-12 ms-auto mb-3">
                                  <div class="form-group text-start">
                                    <label class="text-black"  for="Number">Phone</label>
                                    <input type="number" class="form-control" name="phone" id="Number">
                                  </div>
                              </div>

                              <div class="form-floating mb-4">
                                  <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                  <label class="ms-3" for="floatingTextarea2 ">Comments</label>
                              </div>
                              
                            </div>    
                            <div class=" text-center">
                                <button type="submit" class="btn btn-danger">Submit </button>
                            </div>
                          </form>
                        </div>              
                    </div>
                  </div>
                </div>
              </div>
 
        <!-- Modal End-->
 
  <!-- End Contact Form -->

		

		<!-- Start Footer Section -->
		@include('frontend.footer')
