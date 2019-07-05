@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body" >
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
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
                            <div id="map-canvas" data-geocode="27.549555, 30.813438" class="aly"> </div>
                            <script>
                                var map;

                                function initMap() {
                                    $("#map-canvas").show();
                                    // var div = document.getElementById("hiden");
                                    //  var company_name = div.textContent;
                                    var geocodeString = $("#map-canvas").data("geocode");
                                    var geocode = geocodeString.split(',');
                                    var myLatlng = new google.maps.LatLng(parseFloat(geocode[0]), parseFloat(geocode[1]));
                                    // console.log(parseFloat(geocode[0]), parseFloat(geocode[1]);
                                    var myOptions = {
                                        zoom: 18,
                                        center: myLatlng,
                                        mapTypeControl: true,
                                        mapTypeControlOptions: {
                                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                                        },
                                        navigationControl: true,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                                    }

                                    var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

                                    var marker = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map
                                    });
                                    marker.setMap(map);
                                }

                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK5PWaQ18mE7IJL4l-0XXfgoNBrz7rGXE&callback=initMap">
                            </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
