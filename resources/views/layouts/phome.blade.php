<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <!--Designed and developed by Fluture Technology http://fluturetech.com  -->
    <!-- Start Alexa Certify Javascript -->
    <!-- Start Alexa Certify Javascript -->
    <script type="text/javascript">
        _atrk_opts = { atrk_acct:"2SUWo1IWhd10/9", domain:"lindaikejisblog.com",dynamic: true};
        (function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://certify-js.alexametrics.com/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
    </script>
    <noscript><img src="https://certify.alexametrics.com/atrk.gif?account=2SUWo1IWhd10/9" style="display:none" height="1" width="1" alt="" /></noscript>
    <!-- End Alexa Certify Javascript -->
    <meta name="msvalidate.01" content="719833708E0933F036AF05F7454D1325" />
    <meta name="google-site-verification" content="fl7Tra4d_sW7z05buG5PCUNgOgt6P4VoHFqOVvYRxvM" />
    <meta name="google-signin-client_id" content="783508407836-61bsogdsngcs1sa942fromqbgchojer6.apps.googleusercontent.com">
    <meta charset="utf-8">
    <meta http-equiv="content-type" CONTENT="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="en">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ strip_tags(trim($meta_title)) }}</title>
    <link rel="canonical" href="{{ \Illuminate\Support\Facades\Request::url() }}"/>
    <link rel="alternate" media="only screen and (max-width: 640px)"
          href="{{ str_replace("www.","m.",\Illuminate\Support\Facades\Request::url()) }}">

    <meta name="description" content="{{ strip_tags(trim(utf8_decode($meta_description))) }}">
    <meta name="keywords" content="{{ (isset($keywords) ? $keywords :"blogs") }},news, blog, politics, gossip, Events, Entertainment, Lifestyle, Fashion, Beauty, Inspiration">
    <meta property="article:published_time" content="{{ $meta_time }}">
    <meta property="article:section" content="blog">
    <link rel="icon"
          type="image/png"
          href="https://www.lindaikejisblog.com/img/favicon.png">
    @if(isset($blog_content))
        <?php
            $tags = explode(",",$blog_content->tags);
            foreach($tags as $tag){?>
            <meta property="article:tag" content="{{ $tag }}" />
          <?php  }
        ?>

        @endif

    <meta property="og:description" content="{{ strip_tags(trim(utf8_decode($meta_description))) }}" />
    <meta property="og:title" content="{{ strip_tags(trim(utf8_decode($meta_title))) }}" />
    <meta property="og:url" content="{{ $meta_url }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_GB" />
    <meta property="og:image" content="{{ $meta_image }}" />
    <meta property="og:site_name" content="Linda Ikeji's Blog" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="Linda Ikeji" />
    <meta name="twitter:title" content="{{ strip_tags(trim($meta_title)) }}" />
    <meta name="twitter:desciption" content="{{ strip_tags(trim($meta_description)) }}" />
    <meta name="twitter:image" content="{{ $meta_image }}" />
    <meta name="twitter:site" content="@lindaikeji" />
    <link rel="stylesheet" href="{{ url('/js/vendor/flexslider.css') }}">

    <script data-cfasync="true" type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"WebSite","@id":"#website","url":"https:\/\/www.lindaikejisblog.com\/","name":"Linda Ikeji&#039;s Blog | News, blog, politics, gossip, Events, Entertainment, Lifestyle, Fashion, Beauty, Inspiration","potentialAction":{"@type":"SearchAction","target":"https:\/\/www.lindaikejisblog.com\/search\/result\/?search={search_term_string}","query-input":"required name=search_term_string"}}</script>
    <script data-cfasync="true" type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"Organization","url":"{{ \Illuminate\Support\Facades\Request::url() }}","sameAs":["https:\/\/www.facebook.com\/LindaIkejiBlog","https:\/\/twitter.com\/lindaikeji"],"@id":"#organization","name":"Linda Ikeji&#039;s Blog","logo":"http://www.lindaikejisblog.com/img/favicon.png"}</script>

    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">

    <link rel="icon"
          type="image/png"
          href="https://www.lindaikejisblog.com/img/favicon.png">



    <script data-cfasync="true" async src="{{ url('/js/vendor/all.min.js') }}"></script>


    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <script data-cfasync="true">
        function detectmob() {
            if( navigator.userAgent.match(/Android/i)
                || navigator.userAgent.match(/webOS/i)
                || navigator.userAgent.match(/iPhone/i)
                || navigator.userAgent.match(/iPad/i)
                || navigator.userAgent.match(/iPod/i)
                || navigator.userAgent.match(/BlackBerry/i)
                || navigator.userAgent.match(/Windows Phone/i)
            ){
                return true;
            }
            else {
                return false;
            }
        }

    </script>
    <script src="{{ url('js/jquery.js') }}"></script>

</head>


<body class="page" style="background: url(@if(!background())
{{ url('/img/background.jpg') }}
@else
{{ background() }}
@endif
) repeat;" >
<div class="header">
    <div class="date">
        <!-- &nbsp; Thursday, Jan 5th 2017 4PM -->
        <ul>
            <li>
                <a href="https://www.youtube.com/channel/UCj-Ur2GPU_bVKQmktoxx3mw" target="_blank"><img src="{{ url('/img/oplay.png') }}"  style="height: 20px;" alt="">LindaIkejiTV</a>
            </li>
            <li>
                <a href="https://instagram.com/lindaikejiblogofficial?utm_source=ig_profile_share&igshid=1oynhpuy31jwd" target="_blank"><img src="{{ url('/instagram.png') }}" alt="">Instagram</a>
            </li>
            {{--<li>--}}
                {{--<a href="https://www.lindaikejisocial.com/" target="_blank"><img src="{{ url('/img/lis_favicon.ico') }}"  style="height: 20px;" alt="">LindaIkejiSocial</a>--}}
            {{--</li>--}}
            <li>
                <a  target="_blank" href="javascript:;" data-toggle="modal" data-target="#ads"><img src="{{ url('/img/advert.png') }}"  style="height: 20px;" alt="">Advert enquiry</a>
            </li>
        </ul>
    </div>
    <div class="blog_title">
        <div class="signage">
            <h3><a href="{{ url('/') }}" style="color: #fff;text-decoration: none;">Welcome to Linda Ikeji's Blog <em class="hidden-xs hidden-md" style="font-size: 13px">So much more to read now <img src="{{ url('/images/wink.png') }}" alt=""></em></a></h3>
            <p>
                News, Events, Entertainment, Lifestyle, Fashion, Beauty, Inspiration and yes... Gossip! *Wink*
            </p>
        </div>

        <div class="container search_pane">
            <div class="form_group">
                <form action="{{ url('/search/result') }}" method="get">
                    <input type="text" name="search" class="form-control" placeholder="Search Linda Ikeji's Blog">
                </form>
            </div>
        </div>

        <div class="search_btn">
            <img class="default" src="{{ url('/images/icon_search.png') }}" alt="">
            <img class="searching" src="{{ url('/images/icon_close.png') }}" alt="">
        </div>
    </div>
</div>

{{--<div class="mobile_search hidden-lg hidden-xs">--}}
{{--<i class="fa fa-search"></i>--}}
{{--<input type="text" placeholder="Search Linda Ikeji's Blog">--}}
{{--</div>--}}
@yield('content')

<div class="footer">
    <div class="container">
        <ul>
            <li><a href="javascript:;" data-toggle="modal" data-target="#contactus">News/Tip-off</a></li>
            <li><a href="javascript:;" data-toggle="modal" data-target="#ads">Advertise with us</a></li>
        </ul>
    </div>
    <div class="last_line">
        <p>&copy; Copyright LindaIkeji {{ date('Y') }}</p>
    </div>
</div>

<div id="contactus" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contact Us</h4>
            </div>
            <div class="modal-body">
                <p>Contact us via email:  Lindaikeji@gmail.com,
                Lindaikejiads@gmail.com<br/> Mobile:  08163941957</p>
            </div>
        </div>

    </div>
</div>


<div id="ads" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contact Us</h4>
            </div>
            <div class="modal-body">
                <p>Contact us via email:  Lindaikejiads@gmail.com</p>
                <p>Contact us via Phone:  08163941957, 08118879335</p>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog share_modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>Share Story</b></h4>
            </div>
            <div class="modal-body">
                <div class="story" style="overflow-x: hidden">

                    <div class="pic modal_pic">

                    </div>
                    <p class="modal_text" style="font-size: 18px;font-weight: bold">
                    </p>

                    </span>
                </div>
                <div class="share_pane social_spp">
                    <!-- <em>Share on</em> -->

                </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>


<script type="text/javascript" src="{{ url('/js/vendor/jquery.flexslider-min.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/jquery.lazy.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/js/jquery.lazy.plugins.min.js') }}"></script>
<script>

    $('.lazy').lazy({
        placeholder: "{{ url('/img/loading.gif') }}"
    });



</script>
<noscript id="deferred-styles">
<link rel="stylesheet" href="{{ url('/css/animate.css') }}">
<link rel="stylesheet" href="{{ url('/css/icon/css/font-awesome.min.css') }}">
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
</noscript>
<script data-cfasync="true">
    var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = requestAnimationFrame || mozRequestAnimationFrame ||
        webkitRequestAnimationFrame || msRequestAnimationFrame;
    if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
    else window.addEventListener('load', loadDeferredStyles);
</script>

@yield('script')
<!-- Modal Ends -->
<script data-cfasync="true">
    $(document).ready(function(){
        if(detectmob()){
            $(".story_img").css("margin-top", "-20px");
            $(".remove_mobile").html("");
            $(".desktop_ads").empty();
        }else{
            $(".show_mobile").html("");
            $(".mobile_ads").empty();
        }
    });


    $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: 180,
        itemMargin: 12,
        controlNav: false
    });

    $(document).ready(function(){

        $('.search_btn').click(function () {
            $('.signage').toggleClass('hide');
            $('.blog_title').toggleClass('search_area');
            $('.search_pane').toggleClass('show');
            $(this).toggleClass('search');
        });

        $('.slides').show();
    });

    $(document).ready(function(){$("#full_name_c").val(localStorage.getItem("fullname")),$("#email_c").val(localStorage.getItem("email"))});

    function shareData(title, img,url){
        $('.modal_pic').html('<img src="'+img+'"/>');
        $('.modal_text').html(title);
        $('.social_spp').html(`<a href="https://www.facebook.com/sharer/sharer.php?u=`+url+`" class="share_btn facebook">
            <div class="img_holder">
            <img class="x2_icon" src="{{ url('images/social_icon_fb.png') }}" alt="">
            </div>
            Facebook
            </a>
            <a href="https://twitter.com/home?status=`+url+`" class="share_btn twitter">
            <div class="img_holder">
            <img src="{{ url('images/social_icon_tw.png') }}" alt="">
            </div>
            Twitter
            </a>
            <a href="whatsapp://send?text=`+url+`" class="share_btn whatsapp">
            <div class="img_holder">
            <img src="{{ url('images/social_icon_wa.png') }}" alt="">
            </div>
            Whatsapp
            </a>`)
        $('#myModal').modal();
    }
    function replyComment(o){scrollToElement("#postcomment",600),$("#parent_id").val(o)}var scrollToElement=function(o,t){var l=t?t:600;$("html,body").animate({scrollTop:$(o).offset().top},l)};

    // specify id of element and optional scroll speed as arguments
    function submit_comment(){
        $('.loading').show('slow');
        var ano = $("#anono").val();


        //get the full_name
        if(ano != "1") {
            full_name = $('#full_name_c').val();
            localStorage.setItem('fullname', full_name);
            if (!full_name) {
                $('.error').show('slow');
                $('.error').html("Enter your full_name");
                $('.loading').hide('slow');
                return

            }
            //get the email
            var email = $('#email_c').val();
            if (!email) {
                $('.error').show('slow');
                $('.error').html("Enter your email address");
                $('.loading').hide('slow');

                return;
            }
            if (!validateEmail(email)) {
                $('.error').show('slow');
                $('.error').html("Not a valid email");
                return;
            }
            localStorage.setItem('email',email);
        }

        //get the comment
        var comment = $('#comment_c').val();
        if(!comment){
            $('.error').show('slow');
            $('.error').html("Enter your comment");
            return;
        }

        var parent_id = $('#parent_id').val();


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var full_name = $('#full_name_c').val();
        var email = $('#email_c').val();
        var comment = $('#comment_c').val();
        var img_url = $('#img_url').val();
        //at this point send an ajax call to the server saving the fcm token
        @if(isset($blog_content))
            $.ajax({
            url: '{{ url('/save/comment') }}',
            type: 'post',
            data:  '_token='+ CSRF_TOKEN +"&full_name="+full_name+"&img_url="+ img_url +"&email="+ email+"&comment="+ comment+"&parent_id="+ parent_id+"&blog_id="+'{{ encrypt_decrypt('encrypt',$blog_content->id) }}',
            processData: false,
            success: function( data, textStatus, jQxhr ){
                if(data == "success") {
                    $('.error').hide();
                    $('.success').show();
                    $('#comment_c').val("");
                }else{
                    $('.error').show('slow');
                    $('.error').html("Error Occured!!!");
                }
                $('.loading').hide('slow');

            },
            error: function(){
                $('.loading').hide('slow');
                $('.error').show("slow");
                $('.error').html("An Error Occured, Please try again!!!");
            }
        });
        @endif
    }

    function validateEmail(a){var n=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;return n.test(a)}function changeData(){$(".ano").toggle("slow"),$("#anono").val("1")}function changeUrl(a){window.location=a}



    function likeComment(id){
        var remove = 0;
        if(localStorage.getItem('comment_'+id)){
            var remove = 1;
        }
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var url = '{{ url('/save/likes') }}';

        //at this point send an ajax call to the server saving the fcm token
        $.ajax({
            url: url,
            type: 'post',
            data: '_token=' + CSRF_TOKEN + "&id=" + id +  "&remove=" + remove,
            processData: false,
            success: function (data, textStatus, jQxhr) {
                var count_like = $('.count_' + id).html();
                if (data == "success") {
                    total = parseInt(count_like) + 1;
                    localStorage.setItem('comment_' + id, "done");
                } else {
                    total = parseInt(count_like) - 1;
                    localStorage.removeItem('comment_' + id)
                }
                $('.count_' + id).html(total);
            },
            error: function () {
                console.log('Oops');
            }
        });

    }

    function dlikeComment(id){
        var remove = 0;
        if(localStorage.getItem('dcomment_'+id)){
            var remove = 1;
        }
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var url = '{{ url('/save/dislikes') }}';

        //at this point send an ajax call to the server saving the fcm token
        $.ajax({
            url: url,
            type: 'post',
            data: '_token=' + CSRF_TOKEN + "&id=" + id +  "&remove=" + remove,
            processData: false,
            success: function (data, textStatus, jQxhr) {
                var count_like = $('.dcount_' + id).html();
                if (data == "success") {
                    total = parseInt(count_like) + 1;
                    localStorage.setItem('dcomment_' + id, "done");
                } else {
                    total = parseInt(count_like) - 1;
                    localStorage.removeItem('dcomment_' + id)
                }
                $('.dcount_' + id).html(total);
            },
            error: function () {
                console.log('Oops');
            }
        });

    }



</script>
<script>

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46375425-1', 'auto');
    ga('send', 'pageview');

</script>
<script data-cfasync="true" async src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
<script data-cfasync="true">
    var OneSignal = window.OneSignal || [];
    OneSignal.push(["init", {
        appId: "84aa5873-f67e-4f60-81db-11321ed42400",
        autoRegister: false,
        notifyButton: {
            enable: true /* Set to false to hide */
        }
    }]);
</script>
<!--Designed and developed by Fluture Technology http://fluturetech.com  -->
<script>
    console.log('Designed by FlutureTech');
</script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5ce4a13a7ff0c00012df0e12&product=social-ab' async='async'></script>

<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55d70e0741850788"></script>
{!! richmedia() !!}
</body>

</html>
