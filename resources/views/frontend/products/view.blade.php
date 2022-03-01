@extends('layouts.front')
@section('title', $products->name)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
	<div class="container">
		<h6 class="mb-0">
			<a href="{{url('category')}}">
				Collections
			</a> /
			<a href="{{url('category/'.$products->category->slug)}}">
				{{$products->category->name}}
			</a> /
			<a href="{{url('category/'.$products->category->slug.'/'.$products->slug)}}">
				{{$products->name}}
			</a>
		</h6>
	</div>
</div>

	<div class="container">
		<div class="card shadow product_data">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="pic" alt="prod-image">
					</div>

					<div class="col-md-8">
						<div class="mb-0">
							{{$products->name}}
						</div>

					<hr>
						<label class="mb-3">Original Price : Rs <s>{{$products->original_price}}</s></label>
						<label class="mb-3">Selling Price : Rs {{$products->selling_price}}></label>
						
						<p class="mt-3">
							{{!! $products->small_description !!}}
						</p>
					</hr>

<hr>
					@if($products->quantity > 0)
					<label class="badge bg-success">In stock</label>
					@else
					<label class="badge bg-danger">Out of stock</label>
					@endif

					<div class="row mt-2">
						<div class="col-md-2">
							<input type="hidden" value="{{$products->id}}" class="prod_id">
							<label for="quantity">Quantity</label>
								<div class="input-group-text-center mb-3" style="width: 130px;">
									<button class="input-group-text decrement-btn">-</button>
									<input type="text" name="quantity" value="1" class="form-control quantity-input text-center">
									<button class="input-group-text increment-btn">+</button>
								</div>
						</div>

						<div class="col-md-9">
								<br/>
								@if($products->quantity > 0)
									<button type="button" class="btn btn-primary mb-3 addToCartBtn float-start">Add to Cart</button>
								@endif
									<button type="button" class="btn btn-success mb-3 float-start">Add to Wishlist</button>
						</div>
						<div class="rating-css">
						    <div class="star-icon">
						        <input type="radio" value="1" name="product_rating" checked id="rating1">
						        <label for="rating1" class="fa fa-star"></label>
						        <input type="radio" value="2" name="product_rating" id="rating2">
						        <label for="rating2" class="fa fa-star"></label>
						        <input type="radio" value="3" name="product_rating" id="rating3">
						        <label for="rating3" class="fa fa-star"></label>
						        <input type="radio" value="4" name="product_rating" id="rating4">
						        <label for="rating4" class="fa fa-star"></label>
						        <input type="radio" value="5" name="product_rating" id="rating5">
						        <label for="rating5" class="fa fa-star"></label>
						    </div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


