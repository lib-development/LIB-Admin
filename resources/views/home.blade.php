@extends('layouts.home')

@section('content')
    <div class="main" style="margin-bottom: 10px;">
        @include('includes.frontpage')

        <div class="board">
            <div class="container con_style">
                <div class="row" style="margin-bottom: 33px;">
                    <!-- Main Board Starts Here-->
                    <div class="col-md-9 main_board" style="padding-right: 20px;">
                        <!-- Big Story Row Starts Here -->
                        <div class="row" style="padding: 0px 15px;">
                            <!-- Big Story Starts Here -->
                            <div class="col-md-12">


                                <?php $i = 1; $j = 0;$k = 0; $indegen = 0;?>
                                @foreach($blog_contents as $b_c)

                                    <?php if($b_c->status != "1"){
                                        continue;
                                    }
                                    ?>

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <article class="story_block">
                                            <figure class="story_img">
                                                <h1 class="story_title">
                                                    <a style="color: #890e2a;"
                                                       @if(auth()->check())
                                                       href="{{ url('/p/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html"
                                                       @else
                                                       href="{{ url('/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html"
                                                            @endif
                                                    >

                                                        {{ utf8_decode($b_c->title) }}

                                                    </a>
                                                </h1>
                                                <div class="img_view" style="overflow: hidden;max-height: 333px;">
                                                    <?php
                                                    preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $b_c->content, $urls);
                                                    if(isset($urls[1][0])){
                                                        $img_d = $urls[1][0];
                                                        //since we now have the url , check if it is  a blogger url
                                                        if (strpos($img_d, 'shares') !== false) {
                                                            $img_d = str_replace("shares/",'shares/thumbs/',$img_d);
                                                            $img_d = str_replace("alexis.","www.",$img_d);
                                                            $img_d = str_replace("http:","https:",$img_d);
                                                        }
                                                        if($i > 29){
                                                            echo "<img src='".url('/img/loading2.gif')."' data-src='".$img_d."' class='text-center img_view lazy' alt='".$b_c->title."' style='max-height: 330px;'   />";
                                                        }else{
                                                            echo "<img src='".$img_d."' class='text-center img_view lazy' alt='".$b_c->title."' style='max-height: 330px;'   />";;
                                                        }


                                                    }else{
                                                        preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $b_c->content, $matches);
                                                        if(isset($matches[1])){
                                                            echo '<div class="videoWrapper">
                                                                    <iframe src="'.$matches[1].'" ></iframe></div>';

                                                        }
                                                    }
                                                    ?></div>

                                            </figure>
                                            <div class="story_meta">
                                                <p class="story_description" style="font-size: 13px;line-height: 1.4">
                                                    <?php
                                                    $content = preg_replace("/<img[^>]+\>/i", "", $b_c->content);
                                                    echo substr(utf8_decode(strip_tags($content)),0, 200);
                                                    ?>@if(strlen(utf8_decode(strip_tags($content))) > 200)
                                                        ...
                                                    @endif
                                                </p>


                                            </div>
                                            <div class="meta" style="font-size: 11px;display: inline-flex;">
                                                <a href="javascript:;" onclick="shareData('{{ $b_c->title }}','{{ (isset($img_d) ? $img_d: "") }}','{{ url('/p/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html')" style="height: 17px;padding: 0px 4px;line-height: 15px;background: #890e2a;" class="btn btn-danger">
                                                    <img src="{{ url('/images/icon_share.png') }}" style="height: 11px;padding: 1px;" alt="">
                                                </a>
                                                <div class="post_age" style="margin-left: -9px;"> by Linda Ikeji at {{ \Carbon\Carbon::parse($b_c->publish_date)->format('d/m/y') }}</div>
                                                <div class="divider">|</div>

                                                <div class="comments" style="margin-left: 2px;font-size:12px;"><a style="color: #000;" data-disqus-identifier="{{ $b_c->slug }}"
                                                                                                                  @if(auth()->check())
                                                                                                                  href="{{ url('/p/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html#comments"
                                                                                                                  @else
                                                                                                                  href="{{ url('/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html#comments"
                                                            @endif>{{ (empty($b_c->comments)) ? "0": $b_c->comments }} comments</a></div>
                                                <a @if(auth()->check())
                                                   href="{{ url('/p/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html"
                                                   @else
                                                   href="{{ url('/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html"
                                                   @endif class="pull-right btn btn-danger btn-xs" style="background: #890e2a;margin-left:18px;border: #890e2a;padding: 1px 5px !important;font-size: 9px;line-height: 1.5 !important;">Read More...</a>

                                            </div>
                                        </article>
                                    </div>

                                    <div class="visible-xs">
                                        <div class="clearfix"></div>
                                        <hr>
                                    </div>

                                    @if($i%2 == 0)
                                        <div class="visible-md visible-lg">
                                            <div class="clearfix"></div>
                                            <hr>
                                        </div>
                                    @endif

                                        <?php if(!app('mobile-detect')->isMobile()) {?>
                                        @if($i != 0 && $i%4 == 0)
                                            <div class="desktop_ads">

                                                @if(count($inbtw) > 0 )

                                                    @if(isset($inbtw[$j]))
                                                        <div class="da x728 visible">

                                                            @if($inbtw[$j]['advert_type'] == "0"  || $inbtw[$j]['advert_type'] == null)
                                                                {!! $inbtw[$j]['content'] !!}
                                                            @else
                                                                <a href="{{ $inbtw[$j]['url'] }}">
                                                                    <img data-src="{{ $inbtw[$j]['image_url'] }}" class="lazy" alt="advert banner"/>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    @endif


                                                    <?php $j++;?>
                                                @endif
                                            </div>
                                        @endif
                                        <?php }else{ ?>

                                        @if($indegen == 7)

                                        @endif

                                        @if($i != 0 && $i%3 == 0)

                                            @if($sidebar->count() >0 )
                                                @if(isset($sidebar[$k]))
                                                    <div class="da x728 visible-xs">
                                                        @if($sidebar->count() >0 )

                                                            <?php $sb = $sidebar[$k];?>

                                                            @if($sb->advert_type == "0" || $sb->advert_type == null)
                                                                {!! $sb->content !!}
                                                            @else
                                                                <a href="{{ $sb->url }}">
                                                                    <img data-src="{{ str_replace("alexis.","www.",$sb->image_url) }}" class="lazy" alt="advert banner"/>
                                                                </a>
                                                            @endif
                                                            <div class="clearfix"></div>
                                                            <br/>

                                                        @endif
                                                    </div>
                                                @endif
                                            @endif

                                            <?php  $k++;?>
                                        @endif
                                        <?php }?>






                                <?php $i++; $indegen++;?>
                            @endforeach

                            <!-- Big Story Ends Here -->
                            </div>
                            <!-- Big Story Row Ends Here -->
                            <div class="text-center">
                                {!! $blog_contents->links('pagination') !!}
                            </div>
                        </div>
                    </div>
                    <!-- Main Board Ends Here-->
                    <div class="col-md-3 side_board hidden-xs">
                        <div class="da side_first hidden-xs">
                            @include('includes.sidebar')
                        </div>
                        <div class="da side_first hidden-xs desktop_ads">
                            <?php if(!app('mobile-detect')->isMobile()) {?>

                            @include('includes.sidebar2')
                                <?php } ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
