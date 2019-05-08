{{-- $prods --}}
@extends('layouts.app')
@section('content')

<a href="{{route('insert_page')}}" style="text-decoration: none;"><div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">insert</div></a>
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
            <h2> quantity : <span> {{$prod->quantity}}</span></h2>
            <a href="{{route('view_edit',$prod->id)}}" class="btn btn-primary">edit</a><br><br>
            <a href="{{route('delete_prod',$prod->id)}}" class="btn btn-primary">delete</a>
        </div>
    </div>
    <hr>
    @endforeach
    {{$prods->links()  }}
    @endif
</div>







{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello {{Auth::user()->name }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <center>
        <button class="btn">
            <a href="{{ route('insert_page') }}" class="btn btn-success">insert products</a>
        </button>
    </center>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
