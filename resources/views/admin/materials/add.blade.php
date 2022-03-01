@extends('layouts.admin')
@section('content')
                    <div class="card">
                        <div class="card-header"> <h3>Add Products</h3></div>
                            <div class="card-body">
                                <form action="{{url('insert-materials')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <select name="cate_id" class="form-select" id=""> 
                                                <option value="1">Select a category</option>
                                                @foreach($category as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Small Description</label>
                                            <input type="description" name="small_description" rows="2" class="form-control">
                                        </div> 

                                        <div class="col-md-6 mb-3">
                                            <label for="">Description</label>
                                            <input type="description" name="description" rows="4" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Retail Price</label>
                                            <input type="number" name="original_price" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Discount Price</label>
                                            <input type="number" name="selling_price" class="form-control">
                                        </div>

                                        <div class="col-md-12">
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Status </label>
                                            <input type="checkbox" name="status" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Trending </label>
                                            <input type="checkbox" name="trending" class="form-control">
                                        </div>



                                        <div class="col-md-3 mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" name="qty" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Tax</label>
                                            <input type="number" name="tax" class="form-control">
                                        </div>

                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Keywords</label>
                                            <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_description" rows="3" class="form-control"></textarea>
                                        </div>

                                    
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
@endsection('content')

