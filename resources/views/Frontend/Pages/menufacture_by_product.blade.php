@extends('Frontend.Layout.app')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center"></h2>
        <div class="col-sm-4">

            @foreach($show_product_by_menufacture as $show_product_by_menufactures )
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{asset('fontend/images/home/product1.jpg')}}" alt="" />
                            <h2>{{$show_product_by_menufactures->product_price}}</h2>
                            <p>{{$show_product_by_menufactures->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$show_product_by_menufactures->product_price}}</h2>
                                <p>{{$show_product_by_menufactures->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

    </div><!--features_items-->


@endsection
