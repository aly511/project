@extends('layouts.app')
@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new Product</div>
                    {{-- @include('admin.err_msg') --}}
                <div class="panel-body">
                    <form action="{{route('add_prod')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Name : </label>
                            <input type="text" placeholder="product name" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image : </label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Price : </label>
                            <input type="number" placeholder="product price" name="price" class="form-control" value="{{old('price')}}">
                        </div>

                        <div class="form-group">
                            <label for="quantity">quantity : </label>
                            <input name="quantity" id="quantity" placeholder="product quantity" class="form-control" {{old('quantity')}} >
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Save Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
