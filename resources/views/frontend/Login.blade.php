@include('frontend.header')
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-12 d-flex justify-content-center">
							<div class="intro-excerpt">
								<h1>Login</h1>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		
		<!-- Start Contact Form -->
		<div class="untree_co-section">
      <div class="container">
        <div class="block">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 pb-4 text-center">

              <div class="text-dark text-center mb-5 font-weight-bold "><h1>Login Here!</h1></div>
              @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
              @endif

              <form action="{{route('login')}}" method="POST">
               @csrf
                <div class="form-group text-start">
                  <label class="text-black " for="email">Email address</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>

                <div class="form-group mb-5 text-start">
                  <label class="text-black" for="Password">Password</label>
                  <input type="password" name="password"  class="form-control" id="Password">
                </div>
                <button type="submit" class="btn btn-primary-hover-outline ms-5">Login</button>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- End Contact Form -->

		
  @include('frontend.footer')