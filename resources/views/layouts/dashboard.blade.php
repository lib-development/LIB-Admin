<!DOCTYPE html>
<html lang="en">
<head>
    <!--Designed and developed by Fluture Technology http://fluturetech.com  -->

    <meta charset="utf-8">
    <title>Admin Dashboard LIB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="LIB team">
    <meta name="description" content="News, Events, Entertainment, Lifestyle, Fashion, Beauty, Inspiration and yes... Gossip! *Wink">


    <!--[if IE]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ url('assets/plugins/lib/modernizr.js') }}"></script>
    <link rel="icon" href="{{ url('/img/favicon.png') }}" type="image/png">

    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/monthly/css/monthly.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/plugins/emojionearea/emojionearea.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/date-picker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/dateTime-picker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/customselect/customselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/emojionearea/emojionearea.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/colorpicker/css/bootstrap-colorpicker.min.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/style-default.css') }}">
</head>

<body>
<div class="wrapper has-footer">

    <header class="header-top navbar fixed-top">

        <div class="top-bar">   <!-- START: Responsive Search -->
            <div class="container">
                <div class="main-search">
                    <div class="input-wrap">
                        <input class="form-control" type="text" placeholder="Search Here...">
                        <a href="#"><i class="sli-magnifier"></i></a>
                    </div>
                    <span class="close-search search-toggle"><i class="ti-close"></i></span>
                </div>
            </div>
        </div>  <!-- END: Responsive Search -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle side-nav-toggle">
                <i class="ti-align-left"></i>
            </button>

            <a class="navbar-brand" href="http://www.lindaikejisblog.com" target="_blank">
                <img src="{{ url('/img/favicon.png') }}">
                <span>Linda Ikeji's Blog</span>
            </a>

            <ul class="nav navbar-nav-xs">  <!-- START: Responsive Top Right tool bar -->
                <li>
                    <a href="javascript:;" class="collapse" data-toggle="collapse" data-target="#headerNavbarCollapse">
                        <i class="sli-user"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="search-toggle">
                        <i class="sli-magnifier"></i>
                    </a>
                </li>

            </ul>   <!-- END: Responsive Top Right tool bar -->

        </div>

        <div class="collapse navbar-collapse" id="headerNavbarCollapse">

            <ul class="nav navbar-nav">

                <li class="hidden-xs">
                    <a href="javascript:;" class="sidenav-size-toggle">
                        <i class="ti-align-left"></i>
                    </a>
                </li>
                <li class="hidden-xs">
                    <a href="https://www.lindaikejisblog.com" target="_blank">
                        Visit Website as Admin
                    </a>
                </li>


            </ul>

            <ul class="nav navbar-nav navbar-right">

               <li>
                   <a> <span class="btn btn-primary btn-xs">{{ auth()->user()->type_u->name }}</span></a>
               </li>
                <li class="main-search hidden-xs">
                    <div class="input-wrap">
                        <form action="{{ url('search/article') }}">
                        <input class="form-control" name="search" type="text" placeholder="Search Here...">
                        <a type="submit"><i class="sli-magnifier"></i></a>
                        </form>
                    </div>
                </li>

                <li class="user-profile dropdown">
                    <a href="javascript:;" class="clearfix dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('img/avatar.jpg') }}" alt="" class="hidden-sm">
                        <div class="user-name">{{ auth()->user()->name }} <small class="fa fa-angle-down"></small></div>
                    </a>
                    <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                        {{--<li><a href="#"><i class="sli-user"></i> My Profile</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        <li><a href="{{ url('/logout') }}"><i class="sli-logout"></i> Logout</a></li>
                    </ul>
                </li>

            </ul>

        </div><!-- END: Navbar-collapse -->

    </header>   <!-- END: Header -->

    <aside class="side-navigation-wrap sidebar-fixed">  <!-- START: Side Navigation -->
        <div class="sidenav-inner">

            <ul class="side-nav magic-nav">

                <li class="side-nav-header">Navigation</li>

                <li>
                    <a href="{{ url('/home') }}"><i class="sli-dashboard"></i> <span class="nav-text">Dashboard</span></a>
                </li>

                <li class="has-submenu">
                    <a href="#submenuOne" data-toggle="collapse" aria-expanded="false">
                        <i class="fs-book"></i>
                        <span class="nav-text">Post</span>
                    </a>
                    <div class="sub-menu collapse in secondary" id="submenuOne">
                        <ul>
                            <li><a href="{{ url('/post/article') }}">Create a Post</a></li>

                            <li><a href="{{ url('/articles') }}">Posts ({{ article_all() }})</a></li>
                            <li><a href="{{ url('/pending/approval') }}">Pending Approval ({{ article('2') }})</a></li>
                            <li><a href="{{ url('/published/approval') }}">Published (
                                    @if(auth()->user()->user_type_id == "1")
{{ setting_ii() }}
                                        @else
                                    {{ article('1') }}
                                        @endif
                                        )</a></li>
                            <li><a href="{{ url('/get/draft') }}">Draft ({{ article('3') }})</a></li>
                            @if(auth()->user()->user_type_id == "1")
                                <li><a href="{{ url('/scheduled/post') }}">Scheduled Post ({{ article('4') }})</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                @if(auth()->user()->user_type_id == "1")
                <li class="has-submenu">
                    <a href="#submenuTwo" data-toggle="collapse" aria-expanded="false">
                        <i class="sli-present"></i>
                        <span class="nav-text">Adverts</span>
                    </a>
                    <div class="sub-menu collapse secondary" id="submenuTwo">
                        <ul>
                            <li><a href="{{ url('/post/advert') }}">Post Advert</a></li>
                            <li><a href="{{ url('/adverts') }}">Adverts</a></li>
                        </ul>
                    </div>
                </li>

                    <li class="has-submenu">
                        <a href="#submenuFour" data-toggle="collapse" aria-expanded="false">
                            <i class="sli-docs"></i>
                            <span class="nav-text">Comments   ({{ pending_comment() }})</span>
                        </a>
                        <div class="sub-menu collapse secondary" id="submenuFour">
                            <ul>
                                <li><a href="{{ url('/comments/published') }}">Published</a></li>
                                <li><a href="{{ url('/comments/moderation') }}">Awaiting Moderation</a></li>
                                @if(auth()->user()->email == "williamnwogbo@gmail.com" || auth()->user()->email =="lindaikejisblog.com")
                                <li><a href="{{ url('/comments/settings') }}">Settings</a></li>
                                    @endif
                            </ul>
                        </div>
                    </li>

                <li class="has-submenu">
                    <a href="#submenuThree" data-toggle="collapse" aria-expanded="false">
                        <i class="sli-users"></i>
                        <span class="nav-text">Staff</span>
                    </a>
                    <div class="sub-menu collapse secondary" id="submenuThree">
                        <ul>
                            <li><a href="{{ url('/add/staff') }}">Add Staff</a></li>
                            <li><a href="{{ url('/staffs') }}">Staff</a></li>
                        </ul>
                    </div>
                </li>

                    <li>
                        <a href="{{ url('/reports/now') }}">
                            <i class="sli-graph"></i>
                            <span class="nav-text">Reports</span>
                        </a>
                    </li>
                @endif

                {{--<li>--}}
                    {{--<a href="#" aria-expanded="false">--}}
                        {{--<i class="sli-map"></i>--}}
                        {{--<span class="nav-text">Reports</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                @if(auth()->user()->user_type_id == "1")

                    <li>
                        <a href="{{ url('/settings') }}" aria-expanded="false">
                            <i class="sli-settings"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                    </li>
                        @if(!auth()->user()->setting()->google_token)
                            <li>
                                <a href="{{ url('/getAuth/pull') }}" aria-expanded="false">
                                    <i class="sli-directions"></i>
                                    <span class="nav-text">Connect with Google</span>
                                </a>
                            </li>
                        @endif
                    @endif
            </ul>

        </div><!-- END: sidebar-inner -->

    </aside>
    @yield('content')

    <footer class="footer"> <!-- START: Footer -->
        &copy; {{ date('Y') }} <b> Linda Ikeji's</b> Admin
    </footer>   <!-- END: Footer -->

</div>  <!-- END: wrapper -->

<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/lib/jquery-2.2.4.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/lib/jquery-ui.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/lib/plugins.js') }}"></script>


<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/date-picker/js/bootstrap-datepicker.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/dateTime-picker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/customselect/jquery.customselect.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/lib/characterCounter.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/emojionearea/emojionearea.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>


<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/flot/excanvas.min.js') }}"></script>

<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/lib/sparklines.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/lib/jquery.knob.min.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/monthly/js/monthly.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/plugins/emojionearea/emojionearea.min.js') }}"></script>

<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/js/app.base.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/js/cmp-todo.js') }}"></script>
<script data-cfasync="false" type="text/javascript" src="{{ url('/assets/js/page-dashboard.js') }}"></script>


@yield('script')
<script data-cfasync="false">
    function deleteArticle(id){
        var ask = confirm('Are you sure you want to delete this Post');
        if(ask){
            window.location = '{{ url('/delete/article') }}/'+ id;
        }
    }
    function pushArticle(id){
        var ask = confirm('Are you sure you want to push to all your readers');
        if(ask){
            window.location = '{{ url('/push/update') }}/'+ id;
        }
    }
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    function approveComment(url){
        var ask = confirm("Are you sure, you want to approve this comment?")
        if(ask){
            window.location = url;
        }
    }
    function movetotrash(url){
        var ask = confirm("Are you sure, you want to move this comment to the trash?")
        if(ask){
            window.location = url;
        }
    }

    function clearCache(url){
        if(url){
            window.location = url;
        }
        localStorage.clear();
    }

    function sendAdmin(){
        var w = confirm("Are you sure you want to send to admin?");
        if(w){
            window.localStorage.clear();
            $('.bbb').click();
        }
    }
</script>
<!--Designed and developed by Fluture Technology http://fluturetech.com  -->

</body>
</html>