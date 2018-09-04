<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Voting App</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Voting, Nomination, Laravel" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0); 
        }, false);
        function hideURLbar(){
            window.scrollTo(0,1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="{{ asset('election_template/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('election_template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('election_template/css/flexslider.css') }}" type="text/css" media="screen" />
    <!---strat-slider---->
    <script type="text/javascript" src="{{ asset('election_template/js/jquery-1.11.1.min.js') }}"></script>
    <!---//-slider---->
</head>

<body>
<!-- header -->
    <div class="header_bg">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('election_template/images/logo1.png') }}" alt="" /></a>
                </div>
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Voting App</a></li>
                            @if (Auth::check())
                                <li class="act"><a href="/categories" ><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Categories</a></li>
                            @endif
                        </ul>
                        <!-- Navbar Right Menu -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <span>{{ Auth::user()->name }} <b class="caret"></b></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Menu Footer-->
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out" style="font-size: 20px" aria-hidden="true"></span>
                                            Log out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->    
                    
                </nav>
            </div>
        </div>
    </div>
    <div  class="well text-center">
            <a href="#"><span class="glyphicon glyphicon-bell" style="font-size: 15px" aria-hidden="true"></span> 
                <b>Nomination period:
                    {{ $getPeriodDates->nomination_start_date->format('Y F d') }}
                    - {{ $getPeriodDates->nomination_end_date->format('F d') }} | </b>
                <span class="glyphicon glyphicon-bell" style="font-size: 15px" aria-hidden="true"></span>
                <b> Voting period:
                    {{ $getPeriodDates->voting_start_date->format('Y F d') }}
                    - {{ $getPeriodDates->voting_end_date->format('F d') }}</b>
            </a>
    </div>
{{--     <div class="header_bottom">
    </div> --}}
<!-- //end-header -->
@yield('content')


<!-- scroll_top_btn -->
        <script type="text/javascript" src="{{ asset('election_template/js/move-top.js') }}"></script>
        <script type="text/javascript" src="{{ asset('election_template/js/easing.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            
                var defaults = {
                      containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                 };
                
                
                $().UItoTop({ easingType: 'easeOutQuart' });
                
            });
        </script>
         <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
        <!--end scroll_top_btn -->
<!-- for bootstrap working -->
     <script type="text/javascript" src="{{ asset('election_template/js/bootstrap-3.1.1.min.js') }}"></script>
<!-- //for bootstrap working -->
</body>
</html>