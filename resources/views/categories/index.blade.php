@extends('layouts.app')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            <h4 class="alert-heading">Success!</h4>
            <p>{{Session::get('sucess')}}</p>

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>
    @endif
    
    @if(Session::has('errors'))
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
            <h4 class="alert-heading">Error!</h4>
            <p>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>  
    @endif
    
    <div class="container py-3">
        
        <div class="modal" tabindex="-1" role="dialog" id="editCategoryModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit category</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"&times;></span>
                        </button>
                    </div>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="" placeholder="Enter a category name...">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"></button>
                            <button type="button" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>Categories</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($categories as $category)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        {{$category->name}}

                                        <div class="button-group d-flex">
                                            <button type="button" class="btn btn-sm btn-primary mr-1 edit-category">Edit</button>

                                            <form method="POST"action="{{route('category.destroy',$category->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                    @if($category->children)
                                    <ul class="list-group mt-2">
                                        @foreach($category->children as $child)
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                {{$child->name}}

                                                <div class="button-group d-flex">
                                                    <button type="button" class="btn btn-sm btn-primary mr-1 edit-category">Edit</button>

                                                <form action="{{route('category.destroy',$child->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>    
                                                </div>
                                            </div>
                                        </li> @endforeach
                                    </ul>
                                     @endif
                                </li> 
                                  @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>

    <script src=""https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous""></script>

  <script type="text/javascript">
      $('.edit-category').on('click',function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url="{{url('category')}}/" + id;

        $('#editCategoryModal form').attr('action',url);
        $('#editCategoryModal form input[name="name"]').val(name);
      });
  </script>
@endsection