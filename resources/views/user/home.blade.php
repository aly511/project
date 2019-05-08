{{-- $prods --}}
@extends('layouts.app')
@section('content')

<a href="{{route('view-history')}}" style="text-decoration: none;"><div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">view history</div></a>
<div class="container">
    @if(count($prods)>0)
    @foreach ($prods as $prod)
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset('images/'.$prod->image)}}" class="img-responsive" style="width: 300px; height: 300px; overflow: hidden;">
        </div>
        <div class="col-md-9 text-center">
            <h2> name : <span> {{$prod->name}}</span></h2>
            <h2> price : <span> {{$prod->price}}</span></h2>
            {{-- <a href="{{route('add_to_cart',$prod->id)}}" class="btn btn-primary">addTocart</a><br><br> --}}
            <a href="{{route('add_to_card_by_session',$prod->id)}}" class="btn btn-primary">addTocart</a><br><br>
        </div>
    </div>
    <hr>
    @endforeach
    {{ $prods->links()  }}
    @endif
</div>
@endsection
