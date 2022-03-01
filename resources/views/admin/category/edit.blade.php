@extends('layouts.admin')
@section('content')
                    <div class="card">
                        <div class="card-header"> <h3>Edit Category</h3></div>
                            <div class="card-body">
                                <form action="{{url('update/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" class="form-control" value="{{$category->slug}}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" rows="3" class="form-control">{{$category->description}} </textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" {{ $category->status=="1" ? 'checked':' '}} name="status" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Popular</label>
                                            <input type="checkbox" {{ $category->popular=="1" ? 'checked':' '}} name="popular" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_descrip" rows="3" class="form-control">{{$category->meta_descrip}}"</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Keywords</label>
                                            <textarea name="meta_keywords" class="form-control">{{$category->keywords}}"</textarea>
                                        </div>

                                        @if($category->image)
                                            <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="iamge hrer">
                                        @endif

                                        <div class="col-md-12">
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
@endsection

