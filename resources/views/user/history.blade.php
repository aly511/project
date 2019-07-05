{{-- $prods --}}
@extends('layouts.app')
@section('content')

<a href="{{route('userhome')}}" style="text-decoration: none;">
    <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
        view home
    </div>
</a>
<div class="container">

    @if(count($carts)>0)
    <table class="table table-dark">
        <tr>
            <th>product name</th>
            <th>product price</th>
            <th>product quantity</th>
            <th>full money</th>
            <th>product image</th>
        </tr>
            @foreach ($carts as $cart)<tr>
                {{-- <td class=" text-center"> {{ $cart->key }}</td> --}}
                <td class=" text-center"> {{ $cart['name'] }}</td>
                <td class=" text-center"> {{ $cart['price'] }}</td>
                <td class=" text-center"> {{ $cart['num'] }}</td>
                <td class=" text-center"> {{ $cart['total'] }}</td>
                <td class=" text-center">
                    <img src="{{asset('images/'.$cart['image'])}}" class="img-responsive" style="width: 200px; height: 200px; overflow: hidden;">
                </td>
            </tr>
            <hr>
            @endforeach
    </table>
    @endif
</div>
@endsection
