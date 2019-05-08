{{-- @extends('layouts.app')
@section('content') --}}
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@include('admin.err_msg')

<br />
<h2>Add new Product</h2>
<table class="table">
    <form method="post" action="{{route('add_prod')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <tr>
            <td>name:</td>
            <td> <input name="name" placeholder="product name" value="{{old('name')}}" /></td>
        </tr>
        <tr>
            <td>img: </td>
            <td><input type="file" name="img" src="{{ old('img')}}" /></td>
        </tr>
        <tr>
            <td>price: </td>
            <td><input name="price" placeholder="product price" value="{{ old('price')}}" /></td>
        </tr>
        <tr>
            <td>quantity: </td>
            <td><input name="quantity" placeholder="product quantity" value="{{old('quantity')}}" /></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" class="btn btn-success btn-lg">Add</button></td>

        </tr>
    </form>
</table>
{{-- @endsection --}}
