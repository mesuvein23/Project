@extends('layouts.admin')

@section ('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4>Users Detail
						<a href="{{url('users')}}" class="btn btn-primary float-right">Back</a></h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<label>Role</label>
								<div class="p-2 border">{{$users->role_as == '0'? 'User':'Admin'}}</div>
							</div>

							<div class="col-md-4">
								<label>Fullname</label>
								<div class="p-2 border">{{$users->name}}</div>
							</div>
							<div class="col-md-4">
								<label>Email</label>
								<div class="p-2 border">{{$users->email}}</div>
							</div>
							<div class="col-md-4">
								<label>Phone</label>
								<div class="p-2 border">{{$users->number}}</div>
							</div>
							<div class="col-md-4">
								<label>Address</label>
								<div class="p-2 border">{{$users->address}}</div>
							</div>
							<div class="col-md-4">
								<label>City</label>
								<div class="p-2 border">{{$users->city}}</div>
							</div>
							<div class="col-md-4">
								<label>Region</label>
								<div class="p-2 border">{{$users->region}}</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection