@extends('layouts.lay')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Add New Post</h2>
			</div>
			<div class="pull-right">
				<a href="{{route('posts.index')}}" class="">Back</a>
			</div>
		</div>


	@if($errors->any())
	<div class="alert alert-danger">
		<strong>Whoops!</strong>There were some problems with you input.<br><br>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach	
		</ul>
	</div>
	@endif


	<div class="card-header">
		Create
	</div>
	<div class="card-body">
			<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
				@csrf
				   
				<div class="row">
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Title</strong>
			                <input type="text" name="title" class="form-control" placeholder="Name">
			          </div>
        			</div>	
				
					<div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Body</strong>
			                <textarea class="form-control" style="height:150px" name="body" placeholder="Detail"></textarea>
			            </div>
	        		</div>	
										
				
					<div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Image:</strong>
			                <input type="file" name="image" class="form-control" placeholder="image">
			            </div>
		        	</div>

					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
	                	<button type="submit" class="btn btn-primary">Submit</button>
	        		</div>

				</div>

			</form>	
			</div>
	</div>
</div>
@endsection