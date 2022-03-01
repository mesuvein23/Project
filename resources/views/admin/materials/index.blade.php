@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">
			<h1>Products</h1>
		</div>

		<div class="card-body">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Description</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach($materials as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->description}}</td>
						<td>
							<img src="{{ asset('asset/uploads/materials/'.$item->image)}}" class="w-25" alt="imge here">
						</td>
						<td>
							<a class="btn btn-primary" href="{{url('edit/'.$item->id) }}">Edit</a>
							<a class="btn btn-danger" href="{{url('delete/'.$item->id)}}">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection