@include('frontend.header')
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-12 d-flex justify-content-center">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row" id="product-container">
					
						@foreach($products as $product)
							<div class="col-12 col-md-4 col-lg-3 mb-5">
								<a class="product-item" href="{{route('Single_Product',$product->id)}}">
									@if ($product->image)
										@php
											$product_images = json_decode($product->image,true);
										@endphp
										<div style="height:25vh">
											<img width="50%" src="{{ asset('admin/product_image/' . $product_images[0]) }}" class="img-fluid product-thumbnail">

										</div>
										
									@endif
									
									<h3 class="product-title">{{$product->name}}</h3>
									<strong class="product-price">Rs {{$product->OfferPrice}}.00</strong>
									<a href="{{route('Single_Product',$product->id)}}">
										<span class="icon-cross d-flex justify-content-center ">
											<img src="{{asset('frontend/images/cross.svg')}} " class="img-fluid">
										</span>
									</a>
										
								</a>
							</div> 
						@endforeach
		      	</div>
				<div class="text-center">
					<button id="show-more-btn" class="btn btn-primary">Show More</button>
				</div>
				  
		    </div>
		</div>
		

	<script>
		let offset = {{ count($products) }}; // Set the initial offset

		document.getElementById('show-more-btn').addEventListener('click', function () {
			showMoreProducts();
		});

		function showMoreProducts() {
			fetch(`/get-more-products/${offset}`)
				.then(response => response.json())
				.then(data => {
					const productContainer = document.getElementById('product-container');
					productContainer.innerHTML += data.products;
					offset += data.count;
				});
		}
	</script>
		<!-- Start Footer Section -->
		@include('frontend.footer')
