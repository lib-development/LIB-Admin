@extends('layouts.phome')

@section('content')
    <div class="main">
        @include('includes.frontpage')


        <div class="board">
            <div class="container con_style">
                <div class="row">
                    <!-- Main Board Starts Here-->
                    <div class="col-md-9 main_board">
                        <!-- Big Story Row Starts Here -->
                        <div class="row">
                            <!-- Big Story Starts Here -->
                            <div class="col-md-12">
                                <article class="big_story" style="word-wrap: break-word;">
                                    <?php
                                        if(isset($blog_content)){
                                    $b_c = $blog_content;
                                    ?>
                                    <h1 class="title">{{ utf8_decode($b_c->title) }}</h1>
                                   <br/>


                                        <summary class="description" style="font-size: 16px !important;line-height: 21px;">
                                        <!-- Get the first image and add an ad on it-->
                                        <?php
                                            $content = $b_c->content;
                                            $str = preg_replace('/<img(.*)>/i','',$content,1);
                                             preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $image);
                                            $img_src = (isset($image['src']) ? $image['src'] : "");

                                            $image_tag = preg_match_all('/<img[^>]+>/i',$content, $result);
if(isset($result[0][0])){
                                            $content = str_replace($result[0][0],$result[0][0].' <br/><div class="text-center">
                                       <!-- LI_Article_BTF_Rectangle_300x250/336x280__1_only -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2427099653703778"
     data-ad-slot="1205044426"
     data-ad-format="auto"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>

                                        </div>',$content);
}
                                        ?>
                                            <br/>

                                        <?php

                                        $trs = str_replace("img","img alt='".utf8_decode($b_c->title)."' class='img-responsive text-center' style='margin: auto;'",$content);
//
                                        $img_new = str_replace("s400", 's1600',$img_src);

                                        $trs = utf8_decode(str_replace('href="'.$img_new.'"',' style="cursor: auto;text-decoration: none;color: #000;"',$trs));

                                        $trs = str_replace("clear: both; text-align: center;", 'clear: both;',$trs);
  ?>
                                        {!! utf8_decode($trs) !!}
                                    </summary>
                                    <div class="meta">
                                        <?php
                                        $title =  str_replace("'","",$b_c->title);
                                        ?>
                                        <a href="javascript:;" onclick="shareData('{{ $title }}','{{ (isset($img_d) ? $img_d: "") }}','{{ website_url('/p/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html')" class="share_link">
                                        <img src="{{ website_url('/images/icon_share.png') }}" alt=""></a>
                                        <div class="post_age"> by Linda Ikeji at {{ \Carbon\Carbon::parse($b_c->publish_date)->format('d/m/Y g:i A') }}</div>
                                        <div class="divider">|</div>
                                            <div class="comments"><a style="color: #000;" href="{{ website_url('/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html#comments">{{ $b_c->approved_comments_count->count() }} Comments</a></div>
                                    </div>
<div class="meta">
   <h5 style="color: #000;">Share this Story</h5><div id="share"></div>
   </div>

                                        <div class="sharethis-inline-share-buttons"></div>

            
            <div class="demo-item content">

            <div id="shareIcons"></div>
                                    </div>

                                </article>
                                <?php } ?>
                            </div>
                            <?php $j = 0;?>
                            <div class="text-center">

                                <!-- LI_Article_BTF_Rectangle_300x250/336x280__2_only -->
                                <ins class="adsbygoogle"
                                     style="display:block"
                                     data-ad-client="ca-pub-2427099653703778"
                                     data-ad-slot="8308195748"
                                     data-ad-format="auto"></ins>

<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            </div>
                        <!-- Big Story Ends Here -->
                        </div>
                        <!-- Big Story Row Ends Here -->
                        <hr/>
                        <div class="more_stories flexslider" style="margin-top: 80px;" >
                            <h3>Most Read Stories</h3>
                            <ul class="slides" style="display:none;">
                                <?php $i =1 ;?>
                                @foreach($blog_content_view as $b_c_v)

                                <li class="car_item" style="width: 180px;@if($i > 4)
                                        display: none;
                                        @endif">
                                    @if(auth()->check())
                                        <a href="{{ url('/p/'.$b_c_v->year.'/'.$b_c_v->month.'/'.$b_c_v->slug) }}.html">

                                        @else
                                        <a href="{{ url('/'.$b_c_v->year.'/'.$b_c_v->month.'/'.$b_c_v->slug) }}.html">

                                        @endif
                                <?php
                                        preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $b_c_v->content, $urls);
                                        if(isset($urls[1][0])){

                                            if (strpos($urls[1][0], 'shares') !== false) {
                                                $urls[1][0] = str_replace("shares/",'shares/thumbs/',$urls[1][0]);
                                            }

                                            echo "<img src='".$urls[1][0]."' alt='' style='height: 150px;'/>";
                                        }else{
                                            preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $b_c_v->content, $matches);
                                            if(isset($matches[1])){
                                                echo '<iframe src="'.$matches[1].'" width="180px"></iframe>';
                                            }
                                        }
                                        ?>
                                        <p>{!!  utf8_decode($b_c_v->title) !!}</p>
                                    </a>
                                </li>
                                    <?php $i++;?>
                                @endforeach
                            </ul>
                        </div>

                        <hr>
                        <div class="comments_area">
                            <h3 id="comments">Comments <span>({{ $b_c->approved_comments_count->count() }})</span></h3>
                            <!-- comment div start -->
                            @if($b_c->approved_comments->count() > 0)
                                <?php $advert_count  = 1; $comments_num = 0;?>
                                @foreach($b_c->approved_comments as $comment)
                                    @if($comment->parent_id)
                                    <div class="comment" >
                                        <a href="#" class="pic" style="overflow:hidden">
                                            <img src="
@if(isset($comment->img_url) && !empty($comment->img_url) && $comment->img_url != "undefined")
      {{ $comment->img_url }}
                                            @else
{{ url('img/default_avatar.png') }}
                                                    @endif" alt="">
                                        </a>
                                        <div class="comment_holder">
                                            <div class="comment_top">
                                                <a href="#" class="profile_name"  style="font-size: 14px;">{{ $comment->name }}</a> about {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                            </div>
                                            <p style="font-size: 16px; margin-top: 6px;">
                                                {{ utf8_decode($comment->comments) }}
                                            </p>
                                            <a href="javascript:;" onclick="likeComment('{{ $comment->id }}')" class="btn btn-danger btn-xs" style="font-size:10px;line-height: 16px;background: #8d112b;padding: 0px 4px;">Like this! <span class="count_{{ $comment->id }}">@if($comment->likes){{ $comment->likes }}@else
                                                        0
                                                    @endif</span></a>

                                            <a href="javascript:;" onclick="dlikeComment('{{ $comment->id }}')" class="btn btn-danger btn-xs" style="font-size:10px;line-height: 16px;background: #8d112b;padding: 0px 4px;">Dislike this! <span class="dcount_{{ $comment->id }}">@if($comment->dislikes){{ $comment->dislikes }}@else
                                                        0
                                                    @endif</span></a>

                                            <a href="javascript:;" onclick="replyComment('{{ $comment->id }}')"class="btn btn-danger btn-xs" style="font-size:10px;line-height: 16px;background: #8d112b;padding: 0px 4px;"> Reply</a>

                                            @if(auth()->check())
                                                <a href="javascript:;" onclick="declineC('{{ url('/comment/remove/'.encrypt_decrypt('encrypt',$comment->id)) }}')" class="btn btn-xs btn-danger pull-right">Delete</a>
                                                @endif
                                            <br/>
                                           @if($advert_count % 4 == 0 && $advert_count < 17)
                                                <?php $ads = ["3519258719","4244827654","9262184768","8048341294"] ?>
                                            <!-- /96780719/LI_Article_WTC_Rectangle_728x90//320x100//300x250//336x280_1 -->
                                                 <!-- LI_Article_WTC_Rectangle_728x90/320x100/300x250/336x280_1 -->
                                                <ins class="adsbygoogle"
                                                     style="display:block"
                                                     data-ad-client="ca-pub-2427099653703778"
                                                     data-ad-slot="{{ isset($ads[$comments_num]) ? $ads[$comments_num] : "" }}"
                                                     data-ad-format="auto"></ins>
                                                    <script>
                                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                                    </script>

                                            <?php $comments_num++?>
                                                <br/>
                                               @endif

                                            <?php $advert_count++;?>
                                            <!-- reply div start -->


                                            @if(isset($s_c[$comment->id]))

                                            @foreach($s_c[$comment->id] as $child)
                                                    <div class="comment reply">
                                                        <a href="#" class="pic" style="overflow:hidden">
                                                            <img src="@if(isset($child['img_url']) && !empty($child['img_url']) && $child['img_url'] != "undefined")
                                                            {{ $child['img_url'] }}
                                                            @else
                                                            {{ url('img/default_avatar.png') }}
                                                            @endif" alt="">
                                                        </a>
                                                        <div class="comment_holder">
                                                            <div class="comment_top">
                                                                <a href="#" class="profile_name" style="font-size: 14px;">{{ $child['name'] }}</a> about {{ \Carbon\Carbon::parse($child['created_at'])->diffForHumans() }}

                                                            </div>
                                                            <p style="font-size: 16px; margin-top: 6px;">
                                                                {{ utf8_decode($child['comments']) }}

                                                            </p>
                                                            <a href="javascript:;" onclick="likeComment('{{ $child['id'] }}')" class="btn btn-danger btn-xs" style="font-size:10px;line-height: 16px;background: #8d112b;padding: 0px 4px;">Like this! <span class="count_{{ $child['id'] }}">@if($child['likes']){{ $child['likes'] }}@else
                                                                        0
                                                                    @endif</span></a>
                                                            <a href="javascript:;" onclick="dlikeComment('{{ $child['id'] }}')" class="btn btn-danger btn-xs" style="font-size:10px;line-height: 16px;background: #8d112b;padding: 0px 4px;">Dislike this! <span class="dcount_{{ $child['id'] }}">@if($child['dislikes']){{ $child['dislikes'] }}@else
                                                                        0
                                                                    @endif</span></a>
                                                            <a href="javascript:;" class="btn btn-danger btn-xs" style="font-size:10px;line-height: 16px;background: #8d112b;padding: 0px 4px;" onclick="replyComment('{{ $child['id'] }}')">Reply</a>
                                                            @if(auth()->check())
                                                                <a href="javascript:;" onclick="declineC('{{ url('/comment/remove/'.encrypt_decrypt('encrypt',$child['id'])) }}')" class="btn btn-xs btn-danger pull-right">Delete</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                            @endforeach
                                        @endif


                                        <!-- reply div end -->
                                        </div>
                                    </div>
                                    @endif

                            @endforeach
                        @endif
                        <!-- comment_field area div start -->
                            <div class="comment_field_area" id="postcomment">
                                <div class="g-signin2 pull-right" data-onsuccess="onSignIn" style="margin-bottom: 10px"></div>
                                <h3>Add your comment </h3>
                                <div class="error alert alert-danger" style="display:none"></div>
                                <div style="display:none" class="loading" style="margin:auto;"><img style="height: 50px;" src="{{ url('/img/loading.gif') }}" alt=""/></div>
                                <div class="success alert alert-success" style="display:none">Your post has been submitted and will be visible after the blog owner approves</div>

                                <input type="hidden" id="anono" class="form-control">
                                <div class="clearfix"></div>
                                <div class="ano">
                                    <input type="text" id="full_name_c" placeholder="Fullname" class=" form-control"><br/>
                                    <input type="text" id="email_c" placeholder="Email" class=" form-control"><br/>
                                </div>
                                <input type="hidden" id="parent_id" class="form-control">

                                <textarea id="comment_c" placeholder="Enter your comment" class="form-control"></textarea><br/>
                                <div class="pull-left" style="font-size: 14px;line-height: 50px">
                                    <input type="checkbox" id="ano" name="ano" onclick="changeData()"><label for="ano" style="margin-left: 5px; font-size: 16px;">Anonymous</label><br/>
                                </div>

                                <button class="comment_btn pull-right" onclick="submit_comment()">Submit Comment</button>
                                <div class="clearfix"></div>
                            </div>
                            <!-- comment_field area div end -->
                        </div>
                        <hr>


                    </div>
                    <!-- Main Board Ends Here-->
                    <?php if(!app('mobile-detect')->isMobile()) {?>
                    <div class="col-md-3 side_board">
                        <div class="da side_first">
                            <div class="hidden-xs">
                            @include('includes.sidebar')
                            </div>
                        </div>
                        @include('includes.sidebar2')
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        $(function(){
            // get hash value
            var hash = window.location.hash;
            // now scroll to element with that id
            if(hash) {
                $('html, body').animate({scrollTop: $(hash).offset().top});
            }
        });
        @if(auth()->check())
            function declineC(url){
                var c = confirm('Are you sure you want to delete this comment')
                if(c){
                     window.location = url;
                }
            }
            @endif
        var i = '{{ $blog_content->id }}';
        var jqxhr = $.get( "https://alexis.lindaikejisblog.com/save/count/"+i, function() {
            console.log('...');
        });
       function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            $('#full_name_c').val(profile.getName());
            $('#email_c').val(profile.getEmail());
            $('.ano').append("<input type='hidden' name='img_url' id='img_url' value='"+profile.getImageUrl()+"'/>");
            $('.ano').append('<a href="#" class="pull-right label label-danger" style="margin-bottom: 10px;" onclick="signOut();">Google Sign out</a>');


        }

        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
        }

    </script>

@stop
