@extends('layouts.dashboard')

@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>
              {{ $title }}
            </h1>
            <ol class="breadcrumb   ">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Reports</li>
            </ol>
        </div>
        <div class="btn-group" style="margin-left: 10px;">
            <a href="{{ url('/reports/now') }}" type="button" class="btn
            @if($time == "now")
btn-warning
                    @else
            btn-primary
@endif
">Today</a>
            <a href="{{ url('/reports/week') }}" type="button" class="btn      @if($time == "week")
                    btn-warning
                                        @else
                    btn-primary
        @endif">This Week</a>
            <a href="{{ url('/reports/month') }}" type="button" class="btn      @if($time == "month")
                    btn-warning
                                        @else
                    btn-primary
        @endif">This Month</a>
            <a href="{{ url('/reports/time') }}" type="button" class="btn      @if($time == "time")
                    btn-warning
                                        @else
                    btn-primary
        @endif">All Time</a>
        </div>
        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(count($articles))
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th style="width: 500px">Title</th>
                                        <th>Status</th>
                                        <th>Comments</th>
                                        <th style="width: 150px">Written by</th>
                                        <th style="width: 150px">Views</th>
                                        <th style="width: 150px">Published Date</th>
                                        <th style="width: 100px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                @foreach($articles as $article)
                                        <tr>
                                            <td>
                                                <img src="
                                <?php
                                                preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $article->content, $urls);
                                                if(isset($urls[1][0])){
                                                    echo $urls[1][0];
                                                }else{
                                                    echo "/img/nopic.jpg";
                                                }
                                                ?>" alt="" class="img-responsive" />
                                            </td>
                                            <td>
                                                <a href="{{ url('/post/edit/'.encrypt_decrypt('encrypt',$article->id)) }}">{{ utf8_decode($article->title) }}</a>
                                            </td>

                                            <td>
                                                <p>@if($article->status == "1")
                                                        <span class="label label-success btn-xs">Published</span>
                                                    @elseif($article->status == "2")
                                                        <span class="label label-warning btn-xs">  Pending Approval</span>
                                                    @elseif($article->status == "4")
                                                        <span class="label label-default btn-xs">Scheduled</span>

                                                    @else
                                                        <span class="label label-info btn-xs">Draft</span>
                                                    @endif
                                                </p>
                                            </td>
                                            <td>
                                                {{ $article->comments_c->count() }}

                                            </td>
                                            <td>
                                                @if($article->author_u)
                                                    {{ $article->author_u->name }}
                                                @else
                                                    System Generated
                                                @endif
                                            </td>
                                            <td>
                                                @if(auth()->user()->user_type_id == "1")
                                                    {{ $article->views }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($article->publish_date)->format('d/m/Y g:i A') }}
                                            </td>
                                            <td>

                                                <a href="{{ url('/post/edit/'.encrypt_decrypt('encrypt',$article->id)) }}" class="btn btn-primary btn-xs">Edit</a>
                                                @if(($article->status == "3" && $article->author == auth()->user()->id ) || auth()->user()->user_type_id == "1")
                                                    @if($article->status == "1")
                                                        {{--<a href="#" onclick = "pushArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-info btn-xs">Push</a>--}}
                                                    @endif
                                                    <a href="#" onclick = "deleteArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-danger btn-xs">Delete</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">

                                        {!! $articles->render() !!}

                                </div>
                            @else
                                <div class="alert alert-info">0 Posts awaiting action.</div>
                            @endif
                        </div>
                    </div>





                </div>
            </div>  <!--END: Content Wrap-->
        </div>  <!--END: Content Wrap-->

    </div>
@stop