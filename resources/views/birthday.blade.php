<!DOCTYPE html>
<html lang="en-us" class="no-js">

<head>
    <meta charset="utf-8">
    <title>Happy Birthday Linda</title>
    <meta name="description" content="We wish you a happy happy birthday">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="FlutureTech">

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ url('birthday/img/logo.png') }}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('birthday/img/logo.png') }}">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('birthday/img/logo.png') }}">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('birthday/img/logo.png') }}">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('birthday/img/logo.png') }}">

    <!-- ============== Resources style ============== -->
    <link rel="stylesheet" href="{{ url('birthday/css/style.css') }}" />

    <!-- Modernizr runs quickly on page load to detect features -->
    <script src="{{ url('birthday/js/modernizr.custom.js') }}"></script>
</head>

<body>

<!-- Page preloader -->
<div id="loading">
    <div id="preloader">
        <span></span>
        <span></span>
    </div>
</div>

<!-- Overlay -->
<div class="global-overlay">
    <div class="overlay">

        <!-- Lines Overlay -->
        <div class="overlay-dash"></div>

    </div>
</div>

<!-- START - Home Part -->
<section id="home-wrap">


    <div class="content">

        <!-- Your logo -->
        <img src="{{ url('birthday/img/logo.png') }}" alt="" class="brand-logo text-intro opacity-0" />

        <h1 class="text-intro opacity-0"><span class="polyfy-title">Happy Birthday Linda Ikeji</span></h1>

        <p class="text-intro opacity-0">With joy in our hearts, we wish you a happy birthday, we hope you love the chocolate cake 😊</p>


        <a href="http://lindaikejisblog.com" target="_blank" class="action-btn trigger text-intro opacity-0">Visit Blog</a>

    </div> <!-- /. content -->

    <!-- Social icons -->
    <div class="social-icons text-intro opacity-0">

        <a href="http://fluturetech.com" style="margin-left: -40px;" target="_blank">Contact us</a>

    </div> <!-- /. social-icons -->

</section>


<!-- * Libraries jQuery, Easing and Bootstrap - Be careful to not remove them * -->
<script src="{{ url('birthday/js/jquery.min.js') }}"></script>
<script src="{{ url('birthday/js/jquery.easings.min.js') }}"></script>
<script src="{{ url('birthday/js/bootstrap.min.js') }}"></script>

<!-- Accelerated JavaScript animation JS file -->
<script src="{{ url('birthday/js/velocity.min.js') }}"></script>

<!-- Accelerated JavaScript animation UI JS file -->
<script src="{{ url('birthday/js/velocity.ui.min.js') }}"></script>


<!-- Slideshow/Image plugin -->
<script src="{{ url('birthday/js/vegas.js') }}"></script>

<!-- Scroll plugin -->
<script src="{{ url('birthday/js/jquery.mousewheel.js') }}"></script>

<!-- Custom Scrollbar plugin -->
<script src="{{ url('birthday/js/jquery.mCustomScrollbar.js') }}"></script>


<!-- Main JS File -->
<script src="{{ url('birthday/js/main.js') }}"></script>

<!--[if lt IE 10]><script type="text/javascript" src="{{ url('js/placeholder.js') }}"></script><![endif]-->

</body>

</html>