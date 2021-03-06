<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fred Lopes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>FitHabit</title>
        <script src="https://checkout.stripe.com/checkout.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('js/JSGrid/jsgrid.min.css')}}" rel="stylesheet">
        <link href="{{asset('js/JSGrid/jsgrid-theme.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/editor.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-imageupload.min.css')}}" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/bootbox.min.js')}}"></script>
        <script src="{{asset('js/jquery.mask.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-imageupload.min.js')}}"></script>
        <script src="{{asset('js/alert.js')}}"></script>


        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        <!--[if lt IE 9]>
        <script src="{{asset('js/html5shiv.js')}}"></script>
        <script src="{{asset('js/respond.min.js')}}"></script>
        <![endif]-->       
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="myheader-Top navbar-fixed-top"><!--header-top-->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left" style="background-color: white">
                            <a href="{{ url('/') }}"><img src="{{asset('images/home/logo.png')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8" style="padding-top: 10px; background-color: white">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                @if (Auth::guest())
                                    <li><a class="navmenu-itemtext" href="{{url('/')}}">App</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/login')}}">LogIn</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/register')}}">SignUp</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/register/pt')}}">Fithabit for Personal Trainers</a></li>
                                @else
                                    @if(Auth::user()->user_type == 0)
                                        <li><a class="navmenu-itemtext" href="{{url('/')}}">My Programs</a></li>
                                        <li><a class="navmenu-itemtext" href="{{url('/')}}">Account Settings</a></li>
                                        <li><a class="navmenu-itemtext" href="{{url('/')}}">Blog</a></li>
                                        <li><a class="navmenu-itemtext" href="{{url('/')}}">Fithabit Plus</a></li>
                                    @endif
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ url('/logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                            <a href="#"><img style="width: 100px;padding-left: 10px; margin-top: 3px" src="{{asset('images/home/appstore.png')}}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div><!--/header-top-->


            @if (Auth::guest())
            @else
                @if(Auth::user()->user_type == 1)
                    <div class="myheader-Middle"><!--header-middle-->
                        <div class="col-sm-4">
                            <a href="{{ url('/') }}"><img class="img-circle"
                                                          @if (Auth::user()->user_profilepicurl == "")
                                                                src="{{asset('images/dashboard/emptyprofile.jpg')}}"
                                                          @else
                                                                src="{{asset(Auth::user()->user_profilepicurl)}}"
                                                          @endif
                                                          alt="" /></a>
                            <label style="vertical-align: bottom; margin-left: 10px; font-size: 18px"><?php echo Auth::user()->name;?></label>
                        </div>

                        <div class="col-sm-8" style="padding-top: 5px; background-color: white">
                            <div class="shop-menu pull-left">
                                <ul class="nav navbar-nav">
                                    <li><a class="navmenu-itemtext" href="{{url('/dashboard')}}">Dashboard</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/programbuilder')}}">Program Builder</a></li>

                                    <li><a class="navmenu-itemtext" href="{{url('/myprograms')}}">My Programs</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/signuplist')}}">Signups</a></li>
                                    <li><a class="navmenu-itemtext" href="#">Revenue</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/accountsetting')}}">Account Settings</a></li>
                                    <li><a class="navmenu-itemtext" href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!--/header-middle-->
                @else
                    <div class="myheader-Middle"><!--header-middle-->
                        <div class="col-sm-8" style="padding-top: 5px; background-color: white">
                            <div class="shop-menu pull-left">
                                <ul class="nav navbar-nav">
                                    <li><a class="navmenu-itemtext" href="{{url('/finder/workout')}}">Workout</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/finder/nutrition')}}">Nutrition</a></li>
                                    <li><a class="navmenu-itemtext" href="{{url('/finder/infodoc')}}">Ebooks</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </header><!--/header-->

        @yield('content')

        <footer id="footer"><!--Footer-->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Online Help</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privecy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Billing System</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-widget">
                                <h2>About FitHabit</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Company Information</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Company Location</a></li>
                                    <li><a href="#">Affillate Program</a></li>
                                    <li><a href="#">Copyright</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm- col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About FitHabit</h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="col-sm-8">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                <li><a>Copyright © {{date('Y')}}<span style="color: white">    FitHabit LLC. </span> All rights reserved.</a></li>
                                <li><a><i class="fa fa-phone"></i> +1 23 45 67 891</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@fithabit.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>

        </footer><!--/Footer-->



        <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('js/price-range.js')}}"></script>
        <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/countries.js')}}"></script>
        <script src="{{asset('js/editor.js')}}"></script>



        <!-- Scripts -->
        <script>

            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
            });
        </script>
    </body>
</html>
