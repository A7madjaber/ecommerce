@extends('front.index',['title'=>'Checkout'])
@section('content')
    @push('front-css')
        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/cart_responsive.css') }}">
    @endpush

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title font-weight-light">Your Wishlist Product</div>
						<div class="cart_items">
							<ul class="cart_list">

                              @foreach($products as $row)

                                    <hr style="margin-right: 150px; margin-left:150px;">

                                    <li class="cart_item clearfix">
			<div class="cart_item_image text-center"><br><img src="{{ asset('public/media/product/'.$row->product->image_one) }} " style="width: 70px; width: 70px;" alt=""></div>
			<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
				<div class="cart_item_name cart_info_col">
					<div class="cart_item_title">Name</div>
					<div class="cart_item_text">{{ $row->product->name }}</div>
				</div>

				@if($row->product->color == NULL)

                @else
				<div class="cart_item_color cart_info_col">
					<div class="cart_item_title">Color</div>
					<div class="cart_item_text"> {{ $row->product->color }}</div>
				</div>
				 @endif


                @if($row->product->size == NULL)

                @else
                <div class="cart_item_color cart_info_col">
					<div class="cart_item_title">Size</div>
					<div class="cart_item_text"> {{ $row->product->size }}</div>
				</div>
                @endif

                <div class="cart_item_color cart_info_col">
					<div class="cart_item_title">Action</div><br>
					<a href="{{route('product',$row->product->id)}}" class="btn btn btn-outline-primary">Shop</a>
				</div>



            </div>
        </li>
                                @endforeach
                            </ul>
                        </div>




					</div>
				</div>
			</div>
		</div>
	</div>


<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>
@endsection
