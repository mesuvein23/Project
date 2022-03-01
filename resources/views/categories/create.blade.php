
 
@extends('layouts.app')
@section('content')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> <h3>Create Category</h3></div>
                            <div class="card-body">
                                <form action="{{route('category.store')}} method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <select class="form-control" name="parent_id">
                                            <option value="">Select Parent category</option>

                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
@endsection('content')


