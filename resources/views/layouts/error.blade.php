<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<!--Designed and developed by Fluture Technology http://fluturetech.com  -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Linda Ikeji Blog</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('css/icon/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="shortcut icon" href="{{ url('/img/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ url('js/vendor/flexslider.css') }}">

    <script src="{{ url('js/vendor/jquery.js') }}"></script>
    <script src="{{ url('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/vendor/jquery.flexslider-min.js') }}"></script>
</head>

<body class="page" style="background: url(@if(!background())
{{ url('img/background.jpg') }}
@else
{{ background() }}
@endif
) repeat;">
<div class="header">
    <div class="date">
        <!-- &nbsp; Thursday, Jan 5th 2017 4PM -->
        <ul>
            <li>
                <a href="https://www.youtube.com/channel/UCj-Ur2GPU_bVKQmktoxx3mw" target="_blank"><img src="{{ url('/img/oplay.png') }}" alt="">LindaIkejiTv</a>
            </li>
            <li>
                <a href="http://www.lindaikejimusic.com" target="_blank"><img src="{{ url('/img/music.png') }}" alt="">LindaIkejiMusic</a>
            </li>
            <li>
                <a href="https://www.lindaikejisocial.com/" target="_blank"><img src="{{ url('/img/lis_favicon.ico') }}" alt="">LindaIkejiSocial</a>
            </li>
        </ul>
    </div>
    <div class="blog_title">
        <div class="signage">
            <h3><a href="{{ url('/') }}" style="color: #fff;text-decoration: none;">Welcome to <br class="visible-xs"> Linda Ikeji's Blog <em class="hidden-xs hidden-md" style="font-size: 13px">So much more to read now <img src="{{ url('images/wink.png') }}" alt=""></em></a></h3>
            <p>
                News, Events, Entertainment, Lifestyle, Fashion, Beauty, <br class="visible-xs">Inspiration and yes... Gossip! *Wink*
            </p>
        </div>

    </div>
</div>

<div class="mobile_search hidden-lg">
    <i class="fa fa-search"></i>
    <input type="text" placeholder="Search Linda Ikeji's Blog">
</div>
@yield('content')

<div class="footer">
    <div class="container">
        <ul>
            <li><a href="">Contact us</a></li>
            <li><a href="">How to Complain</a></li>
            <li><a href="">Advertise with us</a></li>
            <li><a href="">Contributors Terms</a></li>
            <li><a href="">Privacy policy & Cookies</a></li>
        </ul>
    </div>
    <div class="last_line">
        <p>&copy; Copyright LindaIkeji {{ date('Y') }}</p>
    </div>
</div>
<!--Designed and developed by Fluture Technology http://fluturetech.com  -->

</body>

</html>
