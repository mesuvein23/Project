@extends('layouts.front')
@section('title')
	Checkout
@endsection

@section('content') 
	<div class="container mt-5">
		<form action="{{url('place-order')}}" method="POST">
					@csrf
		<div class="row">
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<h6>Delivery Information</h6>
						<div class="row">
							<div class="col-md-6">
								<label>Full Name</label>
								<input type="text" name="fullname" value="{{Auth::user()->name}}" class="form-control" placeholder="Full Name">
							</div>
							<div class="col-md-6">
								<label>Email</label>
								<input type="email" name="email" value="{{Auth::user()->fullname}}" class="form-control" placeholder="Pleease enter your email">
							</div>
							<div class="col-md-6">
								<label>Phone Number</label>
								<input type="text" name="phonenumber" value="{{Auth::user()->phonenumber}}"class="form-control" placeholder="Please enter your phone number">
							</div>
							<div class="col-md-6">
								<label>Address </label>
								<input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" placeholder="Please enter your address">
							</div>
							<div class="col-md-6">
								<label>Region</label>
								<input type="text" name="region" value="{{Auth::user()->region}}" class="form-control" placeholder="Please enter your region">
							</div>

							<div class="col-md-6">
								<label>City</label>
								<input type="text" name="city" value="{{Auth::user()->city}}" class="form-control" placeholder="Please enter your city">
							</div>

							
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-5">
				
					<div class="card">
						
							<div class="card-body">
							Order Summary
							<hr>
							
							<table class="table table-striped table-bordered">
								<tbody>
								
										@foreach($cartitems as $item)
										<tr>
											<td>{{$item->products->name}}</td>
											<td>{{$item->products->quantity}}</td>
											<td>{{$item->products->selling_price}}</td>
											
										</tr>
											@endforeach
								</tbody>
							</table>

							<button type="submit" class="btn btn-primary float-end">Place order</button>
						</div>
					</div>

					
								
			</div>
		</div></form>
	</div>
@endsection