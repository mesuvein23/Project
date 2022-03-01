@extends('layouts.admin')

@section('content')
	<div class="card">
		<div class="card-header">
			<h1>Registered User</h1>
		</div>

		<div class="card-body">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach($users as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>{{$item->name}}</td>
						<td>{{$item->email}}</td>
						<td>{{$item->number}}</td>
						<td>{{$item->role_as == '0'? 'User':'Admin'}}</td>
						
						<td>
							<a class="btn btn-primary" href="{{url('view-users/'.$item->id) }}">View</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection