@extends('layouts.admin')
@section('content')
                    <div class="card">
                        <div class="card-header"> <h3>Create Category</h3></div>
                            <div class="card-body">
                                <form action="{{url('store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Description</label>
                                            <input type="description" name="description" rows="3" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Popular</label>
                                            <input type="checkbox" name="popular" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_descrip" rows="3" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Keywords</label>
                                            <textarea name="meta_keywords" class="form-control"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <input type="file" name="image" class="form-control">
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

