@if(count($fp) >0 )
    <div class="da x728" style="margin-bottom: 18px">
        @if(count($fp) >0 )
            @foreach($fp as $front_page)
                @if($front_page->advert_type == "0" || $front_page->advert_type == null)
                    {!! str_replace("src","class='img-responsive' layout='responsive' style='margin: auto;' src",$front_page->content) !!}
                    <br/>
                @else
                    <a href="javascript:;">
                        <img src="{{ str_replace('alexis','www',$front_page->image_url) }}" layout='responsive' onclick="changeUrl('{{ $front_page->url }}')" alt="advert banner"/>
                    </a>
                    <br/>
                @endif
            @endforeach
        @endif
    </div>
@endif