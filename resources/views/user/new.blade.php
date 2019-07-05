<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <style>
        #map-canvas {
            height: 800px;
            width: 1000px;
            background-color: #6495ed;
            display: block;
            margin: auto;
            /*margin-top: 200px;*/
        }
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body>
    <div id="map-canvas" data-geocode="27.549555, 30.813438"> </div>
    <script>
        var map; 
        function initMap() {
            $("#map-canvas").show();
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
</body>

</html>
