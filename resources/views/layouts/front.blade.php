<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Seosight - Shop</title>

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">    
    
    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class="" style="color:lightslategray">

<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">
            <div class="logo">
                <div class="logo-text">
                    <div class="logo-title"><a href="{{route('index')}}"> Our website</a></div>
                </div>
            </div>
            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{Cart::content()->count()}}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart align-center">${{Cart::total()}}</h4>
                            <br>
                            <a href="/cart">
                                <div class="btn btn-small btn--dark">
                                    <span class="text">view Cart</span>
                                </div>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>

            <ul class="nav-add">
                <li class="search search_main" style="color: black;margin-right:50px;">
                    <a href="#" class="js-open-search">
                        <i class="seoicon-loupe"></i>
                    </a>
                </li>
            </ul>

            <!-- Left Side Of Navbar -->
            <ul class="primary-menu-menu" style="margin-top:10px;">
                <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('products.create')}}">Add a New Products</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{route('products.index')}}">Products</a></li> --}}
                
            </ul>
        </div>

    </div>

</header>


<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <h4 class="h1 heading-title">E-commerce Website</h4>
                    <p class="heading-text">Buy books, and we ship to you....:)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    @yield('page')
</div>

<!-- Footer -->

<footer class="footer align-center">
    {{-- <div class="sub-footer"> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 justify-content-center">
                    <p class="text-center" >Developed By : &copy; Mostafa Medht</p>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</footer>

<!-- Overlay Search -->
<div class="overlay_search">
    <div class="container">
        <div class="row">
            <div class="form_search-wrap"> 
                <form method="GET" action="{{route('results', ['query'])}}">
                    <input class="overlay_search-input" name="query" placeholder="Type and hit Enter..." type="text">
                    <a href="#" class="overlay_search-close">
                        <span></span>
                        <span></span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Overlay Search -->

<script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('app/js/theme-plugins.js')}}"></script>
<script src="{{asset('app/js/main.js')}}"></script>
<script src="{{asset('app/js/form-actions.js')}}"></script>

<script src="{{asset('app/js/velocity.min.js')}}"></script>
<script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('app/js/animation.velocity.min.js')}}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script> 
<script>
    @if (Session::has('success'))

        toastr.success("{{ Session::get('success')}}")
    @endif
    @if (Session::has('info'))

        toastr.info("{{ Session::get('info')}}")
    @endif
</script>
<!-- ...end JS Script -->


</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->
</html>