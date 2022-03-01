@extends('layouts.admin')
@section('content')
                    <div class="card">
                        <div class="card-header"> <h3>Edit Products</h3></div>
                            <div class="card-body">
                                <form action="{{url('update-products/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        
                                        <div class="col-md-12 mb-3">
                                            <label for="">Category</label>
                                            <select name="cate_id" class="form-select" id=""> 
                                                <option value="">{{$products->category->name}}</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{$products->name}}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" class="form-control" value="{{$products->slug}}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Small Description</label>
                                            <input type="description" name="small_description" rows="2" class="form-control" value="{{$products->small_description}}">
                                        </div> 

                                        <div class="col-md-6 mb-3">
                                            <label for="">Description</label>
                                            <input type="description" name="description" rows="4" class="form-control" value="{{$products->description}}">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Retail Price</label>
                                            <input type="number" name="original_price" class="form-control" value="{{$products->original_price}}">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Discount Price</label>
                                            <input type="number" name="selling_price" class="form-control" value="{{$products->selling_price}}">
                                        </div>


                                        <div class="col-md-3 mb-3">
                                            <label for="">Status </label>
                                            <input type="checkbox" {{ $products->status=="1" ? 'checked':'' }} name="status" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Trending </label>
                                            <input type="checkbox" {{ $products->trending=="1" ? 'checked':'' }} name="trending" class="form-control">
                                        </div>



                                        <div class="col-md-3 mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" value="{{$products->quantity}}">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Tax</label>
                                            <input type="number" name="tax" class="form-control" value="{{$products->tax}}">
                                        </div>

                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control" value="{{$products->meta_title}}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Keywords</label>
                                            <textarea name="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
                                        </div>

                                        @if($products->image)
                                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" width="600" height="400">
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
@endsection('content')

