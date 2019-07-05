{{-- $prods --}}
@extends('layouts.app')
@section('content')
{{-- <link rel="stylesheet" href="style.css"> --}}
    <a href="{{route('view-history')}}" style="text-decoration: none;">
        <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
            view history
        </div>
    </a>
    <div class="container">
        @if(count($prods)>0)
            @foreach ($prods as $prod)

                {{-- <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-5"">
                        <img src="{{asset('images/'.$prod->image)}}" class="img-responsive" style="width: 300px; height: 300px; overflow: hidden;">
                    </div>
                    <div class="col-md-9 text-center">
                        <h2> name : <span> {{$prod->name}}</span></h2>
                        <h2> price : <span> {{$prod->price}}</span></h2>
                        <a href="{{route('add_to_card_by_session',$prod->id)}}" class="btn btn-primary">add To cart by session</a><br><br>
                    </div>
                </div> --}}

                <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-5"">
                                <div class="sea-card" style="border: 1px solid #eaeaea; text-align: center; box-shadow: 1px 3px 12px hsla(0,0%,0%,0.2); margin: 20px 0;margin-bottom: 0px;">
                                        <img src="{{asset('images/'.$prod->image)}}" class="img-responsive" style="width: 100%;height: auto; border: none;">
                                        <h2> name : <span> {{$prod->name}}</span></h2>
                                        <h2> price : <span> {{$prod->price}}</span></h2>
                                        <a href="{{route('add_to_card_by_session',$prod->id)}}" class="btn btn-primary btn-block sea-btn">
                                                <i class="fa fa-shopping-cart"></i>add To cart by session</a><br><br>
                                </div>
                        </div>
                </div>

                <hr>
            @endforeach
            {{ $prods->links()  }}
        @endif
    </div>
@endsection

