@extends('layouts.mhome')

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
                                            <!-- /96780719/LI_Article_BTF_Rectangle_300x250//336x280__1_only -->
<div id=\'div-gpt-ad-1509384239169-0\'>
<script>
googletag.cmd.push(function() { googletag.display(\'div-gpt-ad-1509384239169-0\'); });
</script>
</div>
                                        </div>',$content);
                                        }
                                        ?>
                                        <br/>

                                        <?php

                                        $trs = str_replace("img","img alt='".utf8_decode($b_c->title)."' layout='responsive' class='img-responsive text-center' style='margin: auto;'",$content);
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

                                    <script>
                                        $("#share").jsSocials({
                                            shares: ["email", "twitter", "facebook", "googleplus", "linkedin",  "whatsapp"]
                                        });
                                    </script>


                                    <div class="demo-item content">

                                        <div id="shareIcons"></div>
                                    </div>

                                </article>
                                <?php } ?>
                            </div>
                            <?php $j = 0;?>
                            <div class="text-center">
                                <!-- /96780719/LI_Article_BTF_Rectangle_300x250//336x280__2_only -->
                                <div id='div-gpt-ad-1509384239169-1'>
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
                            </div>
                            <!-- Big Story Ends Here -->
                        </div>
                        <!-- Big Story Row Ends Here -->
                        <hr/>
                        <div>
                            <h3 style="background: #5b091d;color: #fff;padding: 10px;">Most Read Stories</h3>
                            <ul>
                                @foreach($blog_content_view as $b_c_v)

                                    <div class="car_item" style="width: 180px; ">
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
                                                                $urls[1][0] = str_replace("alexis.","www.", $urls[1][0]);
                                                                $urls[1][0] = str_replace("http:","https:", $urls[1][0]);
                                                            }

                                                            echo "<img src='".$urls[1][0]."' layout='responsive' alt='' style='height: 150px;'/>";
                                                        }else{
                                                            preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $b_c_v->content, $matches);
                                                            if(isset($matches[1])){
                                                                echo '<iframe src="'.$matches[1].'" width="180px"></iframe>';
                                                            }
                                                        }
                                                        ?>
                                                        <p>{!!  utf8_decode(str_replace("alexis.","www.", $b_c_v->title)) !!}</p>
                                                    </a>
                                    </div>
                                @endforeach
                            </ul>
                        </div>

                        <hr>
                        <div class="comments_area">
                            <h3 id="comments">Comments <span>({{ $b_c->approved_comments_count->count() }})</span>
                                <a href="{{ str_replace("amp","www",url()) }}" class="btn btn-info pull-right" >Add your comment </a>
                            </h3><!-- comment div start -->


                        <hr>


                    </div>
                    <!-- Main Board Ends Here-->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


