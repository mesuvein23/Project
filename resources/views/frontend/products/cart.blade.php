@extends('layouts.front')
@section('title')
	Cart
@endsection

@section('content') 
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
	<div class="container">
		<h6 class="mb-0">
			<a href="{{url('/')}}">
				Home
			</a> /
			<a href="{{url('cart')}}">Cart
			</a> 
		</h6>
	</div>
</div>


	<div class="container my-5">
		<div class="card shadow">
			@if($cartitems->count()>0)
				<div class="card-body">
					@php $total=0; @endphp
					@foreach($cartitems as $item)
						<div class="row product_data">
							<div class="col-md-2">
								<img src="{{asset('assets/uploads/products/'.$item->products->image)}}" class="pic" alt="imghere">
							</div>
							<div class="col-md-3">
								<h3>{{ $item->products->name }}</h3>
								
							</div>
							<div class="col-md-2">
								<h3>Rs {{ $item->products->selling_price }}</h3>
							</div>
							<div class="col-md-3">
								<input type="hidden" value="{{ $item->prod_id}}" class="prod_id">
								@if($item->products->quantity >= $item->prod_quantity)
									<label for="quantity">Quantity</label>
										<div class="input-group-text-center mb-2" style="width: 100px;">
											<button class="input-group-text changeQuantity decrement-btn">-</button>
											<input type="text" name="quantity" value="{{$item->prod_quantity}}" class="form-control quantity-input text-center">
											<button class="input-group-text changeQuantity increment-btn">+</button>
										</div>
										@php $total+=$item->products->selling_price*$item->prod_quantity; @endphp
								@else 
								<h6>
									Out of stock
								</h6>
								@endif	

							</div>
							

							<div class="col-md-1">
								<button class="btn btn-danger delete-cart-item"><i class="fa fa-trash" aria-hidden="true">Delete</i>
								</button>
							</div>
						</div>
					@endforeach
				</div>
				<div class="card-footer">
					<h6>Total Price:{{$total}}
					<a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Check Out</a>
					</h6>
				</div>

				@else
				<div class="card-body text-center">
					<h2>Your <i class="fa fa-shopping-cart"></i>Cart is empty</h2>
					<a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
				</div>
			@endif
		</div>
	</div>


@endsection
