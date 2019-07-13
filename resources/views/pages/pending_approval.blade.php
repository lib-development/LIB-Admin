@extends('layouts.dashboard')

@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>
                @if(isset($published))
                            Published
                        @elseif(isset($draft))
                            Draft
                @elseif(isset($schedule))
Scheduled
                @else
                            Pending
                    @endif
                    Articles
            <span class="btn btn-danger pull-right">({{ number_format($articles_count) }})</span>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">
                    @if(isset($published))
                        Published
                    @elseif(isset($draft))
                        Draft
                    @elseif(isset($schedule))
                        Scheduled
                    @else
                        Pending
                    @endif Articles</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">
                <div class="panel panel-default" style="padding: 10px;">
                    @include('errors.showerrors')

                @if(count($articles))
                        <div style="overflow-x:auto;">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th style="width: 500px">Title</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th style="width: 150px">Written by</th>
                            <th style="width: 150px">Views</th>
                            <th style="width: 150px">@if(isset($published))
                                    Published Date
                                                         @elseif(isset($draft))
                                                         Last Updated
                                                         @elseif(isset($schedule))
                                    Scheduled Date/time

                                @else
                                    Date/Time
                                    @endif</th>
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
                                    <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}">{{ utf8_decode($article->title) }}</a>
                                </td>

                                <td>
                                    <p>@if($article->status == "1")
                                            <span class="label label-success btn-xs">Published</span>
                                        @elseif($article->status == "2")
                                            <span class="label label-warning btn-xs">  Pending Approval</span>
                                        @elseif($article->status == "4")
                                            <span class="label label-danger btn-xs">Scheduled</span>
                                        @else
                                            <span class="label label-info btn-xs">Draft</span>
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    {{ $article->comments }}

                                </td>
                                <td>
                                    @if($article->author)
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
                                    @if(isset($draft))
                                        {{ \Carbon\Carbon::parse($article->updated_at) }}
                                        @elseif(isset($schedule))
                                       <span class="label label-xs label-danger">{{ \Carbon\Carbon::parse($article->schedule) }}</span>
                                    @else
                                    {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y g:i A') }}
                                        @endif
                                </td>
                                <td>

                                    <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}" class="btn btn-primary btn-xs">Edit</a>
                                    @if(($article->status == "3" && $article->author == auth()->user()->id ) || auth()->user()->user_type_id == "1")
                                        @if($article->status == "1")
                                            @if(auth()->user()->user_type_id == "1")

                                            <a href="#" onclick = "pushArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-info btn-xs">Push</a>
                                            @endif
                                        @endif
                                        <a href="#" onclick = "deleteArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-danger btn-xs">Delete</a>
                                    @endif
                                    @if(auth()->user()->user_type_id != "1")
                                        <a href="#" onclick = "deleteArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-danger btn-xs">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        </div>
                    <div class="text-center">
                        @if(isset($search))
                            {!! $articles->appends(Request::only('search'))->links() !!}
                        @else
                            {!! $articles->render() !!}
                        @endif
                    </div>
                @else
                    <div class="alert alert-info">Oops, you have not created any article</div>
                @endif

                </div>
            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@stop

