@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{   session()->put('user_role',Auth::user()->role)  }}
                    {{-- {{ Auth::user()->role }}<br>
                   check {{ Auth::check() }}<br>
                    my session {{ session()->get('user_role') }} --}}
                    <br>
                    <center>wellcome  {{ Auth::user()->name }}  &#x1F9D1; &#x1F64D;&#x200D;&#x2642;&#xFE0F; &#x1F49F; you are a {{ Auth::user()->role }} </center>
                    @if (Auth::user()->role =='admin')
                        <a href="{{route('adminhome')}}" style="text-decoration: none;">
                            <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
                                go home
                            </div></a>
                    @elseif (Auth::user()->role =='user')
                        <a href="{{route('userhome')}}" style="text-decoration: none;">
                            <div class="btn btn-primary" style="margin: auto;display: block;width: 300px;border-radius: 15%;margin-bottom: 15px;">
                                go home
                            </div></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
