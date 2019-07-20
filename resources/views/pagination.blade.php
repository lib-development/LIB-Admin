@if ($paginator->hasPages())
    <ul class="pager">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span><< Previous</span></li>
        @else
            <li><a href="<?php
                        $url = $paginator->previousPageUrl();
                        $url = explode('?',$paginator->previousPageUrl());
                        $url = str_replace("page=","",$url[1]);

                            $url = "http://lindaikejisblog.com/page/".$url;

//                $url = str_replace('127.0.1.1','lindaikejisblog.com',$paginator->previousPageUrl());
                echo $url;
                ?>"  style="color: #911230;" rel="prev"><< Previous</a></li>
        @endif
        {{-- Pagination Elements --}}
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="<?php
                $url = $paginator->nextPageUrl();
                $url = explode('?',$paginator->nextPageUrl());
                $url = str_replace("page=","",$url[1]);


                    $url = "http://lindaikejisblog.com/page/".$url;

                //                $url = str_replace('127.0.1.1','lindaikejisblog.com',$paginator->previousPageUrl());
                echo $url;
                ?>" style="color: #911230;" rel="next">Next >></a></li>
        @else
            <li class="disabled"><span>Next >></span></li>
        @endif
    </ul>
@endif