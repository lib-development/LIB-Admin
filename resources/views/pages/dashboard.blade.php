@extends('layouts.dashboard')

@section('content')
       <!-- END: Side Navigation -->

        <div class="main-container">    <!-- START: Main Container -->

            <div class="page-header">
                <h1>Dashboard <small>Welcome back <span class="text-primary">{{ auth()->user()->name }}</span></small></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>

            <div class="content-wrap">  <!--START: Content Wrap-->
                @if(auth()->user()->user_type_id != "1")

                <div class="row">
@if(auth()->user()->user_type_id == "1")
                    <div class="col-md-4 col-sm-6">
<a href="{{ url('/posts') }}">
                        <div class="mini-Vchart ui-item">
                            <div class="ui-top">
                                <!-- Heading -->
                                <h4>Posts</h4>
                                <h2 class="text-primary">{{ $articles }}</h2>
                            </div>
                        </div>
</a>

                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ url('/staffs') }}">
                        <div class="mini-Vchart ui-item">
                            <div class="ui-top">
                                <!-- Heading -->
                                <h4>Staff</h4>
                                @if(isset($staffs))
                                    <h2 class="text-primary">{{ $staffs }}</h2>
                                @else
                                <h2 class="text-primary">0</h2>
                                @endif
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a href="#">
                        <div class="mini-Vchart ui-item">
                            <div class="ui-top">
                                <!-- Heading -->
                                <h4>Active Adverts</h4>
                                <h2 class="text-primary">{{ $adverts }}</h2>
                            </div>
                        </div>
                        </a>

                    </div>
                         @elseif(auth()->user()->user_type_id == "2")
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ url('/posts') }}">
                            <div class="mini-Vchart ui-item">
                                <div class="ui-top">
                                    <!-- Heading -->
                                    <h4>Posts</h4>
                                    <h2 class="text-primary">{{ $articles }}</h2>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ url('/posts/approval/pending') }}">
                            <div class="mini-Vchart ui-item">
                                <div class="ui-top">
                                    <!-- Heading -->
                                    <h4>Pending Post</h4>
                                    <h2 class="text-primary">{{ $pending }}</h2>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">

                            <div class="mini-Vchart ui-item">
                                <div class="ui-top">
                                    <!-- Heading -->
                                    <h4>Published Post</h4>
                                    <h2 class="text-primary">{{ $published }}</h2>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
                <div class="clearfix">
                </div>
                <br/>
@endif

                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Pending Articles for approval</h3>
                            </div>
                            <div class="panel-body">
                                @if(count($pending_content))
                                    <div style="overflow-x:auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th style="width: 500px">Title</th>
                                            <th>Status</th>
                                            <th>Comments</th>
                                            <th style="width: 150px">Written by</th>
                                            <th style="width: 150px">Views</th>
                                            <th style="width: 150px">Date/Time</th>
                                            <th style="width: 100px">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pending_content as $article)
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
                                                    {{ \Carbon\Carbon::parse($article->created_at)->format('d/m/Y g:i A') }}
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
                                        @if(isset($search))
                                            {!! $pending_content->appends(Request::only('search'))->links() !!}
                                        @else
                                            {!! $pending_content->render() !!}
                                        @endif
                                    </div>
                                @else
                                    <div class="alert alert-info">0 Posts awaiting action.</div>
                                @endif

                            </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>  <!--END: Content Wrap-->

        </div>  <!-- END: Main Container -->


@endsection