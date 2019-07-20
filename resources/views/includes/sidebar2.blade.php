@if($blog_contents2->count() > 0)
    <h2 style="padding: 10px;background: #890e2a;color: #fff;">Older Posts...</h2>
    <?php $i = 0;?>
    @foreach($blog_contents2 as $bc_2)
        {{--@if($i == 10)--}}
            {{--@if(inbetween())--}}
                {{--<article class="side_story">--}}
                    {{--<div class="row story_holder" style="height:84px;overflow: hidden;">--}}
                        {{--{!!  inbetween() !!}--}}
                    {{--</div>--}}
                {{--</article>--}}
            {{--@endif--}}
        {{--@endif--}}
        <article class="side_story">
            <div class="row story_holder" style="height:84px;overflow: hidden;">
                <a href="#" class="col-md-5 col-xs-5 pic">
                    <?php
                    preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $bc_2->content, $urls);
                    if(isset($urls[1][0])){
                        $img_d = $urls[1][0];
                        if (strpos($img_d, 'shares') !== false) {
                            $img_d = str_replace("shares/",'shares/thumbs/',$img_d);
                            $img_d = str_replace("alexis.","www.",$img_d);
                            $img_d = str_replace("http:","https:",$img_d);
                        }

                        echo "<img src='".url('/img/loading2.gif')."' data-src='".$img_d."' alt='".$bc_2->title."' layout='responsive' class='lazy'/>";
                    }
                    ?>
                </a>
                <a href="{{ url('/'.$bc_2->year.'/'.$bc_2->month.'/'.$bc_2->slug) }}.html"
                        style="font-size:13px; margin-bottom: 0px;" class="col-md-7 col-xs-7 title">
                    {{--@if(strlen($bc_2->title) > 47)--}}
                        {{--{{ substr($bc_2->title,0,47) }} ...--}}
                    {{--@else--}}
                        {{ utf8_decode($bc_2->title) }}
                    {{--@endif--}}
                </a>
                <p class="col-md-7 col-xs-7" style="word-wrap: break-word;font-size: 11px;"> <?php
                    $content = preg_replace("/<img[^>]+\>/i", "", $bc_2->content);
                    echo substr(strip_tags(utf8_decode($content)),0, 80);
                    ?>@if(strlen(utf8_decode($content)) > 80)
                        ...
                    @endif</p>
            </div>
            <div class="meta" style="font-size: 11px;">
                <?php
                $title = str_replace("'","",$bc_2->title);
                ?>
                <a href="javascript:;" onclick="shareData('{{ $title }}','{{ (isset($img_d) ? $img_d: "") }}','{{ url('/'.$bc_2->year.'/'.$bc_2->month.'/'.$bc_2->slug) }}.html')" class="share_link">
                    <img src="{{ url('/images/icon_share.png') }}" class="lazy" style="padding: 1px;" alt="">
                </a>
                <div class="post_age"> by Linda Ikeji at {{ \Carbon\Carbon::parse($bc_2->publish_date)->format('d/m/Y') }}</div>
                <div class="divider">|</div>
                    <div class="comments"><a style="color: #000;"

                                             href="{{ url('/'.$bc_2->year.'/'.$bc_2->month.'/'.$bc_2->slug) }}.html#comments"

                                             >
                            {{ (empty($bc_2->comments)) ? "0": $bc_2->comments }} comments</a></div>
            </div>
        </article>
<hr>

    @endforeach
@endif