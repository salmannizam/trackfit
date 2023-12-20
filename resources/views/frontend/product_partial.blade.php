@foreach($moreProducts as $product)
    <div class="col-12 col-md-4 col-lg-3 mb-5">
        <a class="product-item" href="{{route('Single_Product',$product->id)}}">
            @if ($product->image)
                @php
                    $product_images = json_decode($product->image,true);
                @endphp
                <img src="{{ asset('admin/product_image/' . $product_images[0]) }}" class="img-fluid product-thumbnail">
                
            @endif
            
            <h3 class="product-title">{{$product->name}}</h3>
            <strong class="product-price">Rs {{$product->OfferPrice}}.00</strong>
            <a href="{{route('Single_Product',$product->id)}}">
                <span class="icon-cross">
                    <img src="{{asset('frontend/images/cross.svg')}} " class="img-fluid">
                </span>
            </a>
                
        </a>
    </div> 
@endforeach