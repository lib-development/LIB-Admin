@if($sidebar->count() >0 )
    <div class="da x728">
        @if($sidebar->count() >0 )
            <?php $i = 0;?>
            @foreach($sidebar as $sb)
                @if($sb->advert_type == "0" || $sb->advert_type == null)
                    {!! $sb->content !!}
                @else
                    <a href="{{ $sb->url }}" target="_blank">
                        <?php
                            $data = $sb->image_url;
                        ?>
                        <img src="{{ str_replace("http:","https:",str_replace("alexis.","www.",$data))  }}" height="250"  layout="responsive" alt="advert banner"/>
                    </a>
                @endif


                <?php $i++;?>
            @endforeach
        @endif
    </div>
@endif