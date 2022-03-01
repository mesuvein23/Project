@extends('layouts.front')
@section('title')
	My-Orders
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						Order View
						<a href="{{url('my-orders')}}" class="btn btn-warning float-end">Back</a>
					</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<label>Fullname</label>
									<div class="border p-2">{{$orders->fullname}}</div>

									<label>Email</label>
									<div class="border p-2">{{$orders->email}}</div>

									<label>Contact no </label>
									<div class="border p-2">{{$orders->phonenumber}}</div>
									
									<label>Shipping Address</label>
									<div class="border p-2">
										{{$orders->address}},
										{{$orders->city}},
										{{$orders->region}}
									</div>
								</div>
							
					
							<div class="col-md-6">
								<table class="table table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Quantity</th>
										<th>Price</th>
										<th>Image</th>
									</tr>
								</thead>

								<tbody>
									@foreach($orders->orderitems as $item)
										<tr>
											<td>{{ $item->products->name }}</td>
											<td>{{ $item->quantity }}</td>
											<td>{{ $item->price }}</td>
											<td>
												<img src="{{asset('assets/uploads/products/'.$item->products->image)}}" alt="imaged" class="pic">
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							<h4>Grand Total:{{$orders->total_price}}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection