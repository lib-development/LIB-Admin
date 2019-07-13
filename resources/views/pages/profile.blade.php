@extends('layouts.dashboard')

@section('content')

    <div class="main-container">    <!-- START: Main Container -->


        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="list-flow-info">
                                <li class="col-xs-4 text-primary">
                                    <h3>Articles</h3>
                                    <h4>{{ $articles_c }}</h4>
                                </li>
                                <li class="col-xs-4 text-info">
                                    <h3>Pending</h3>
                                    <h4>{{ $pending_c }}</h4>
                                </li>
                                <li class="col-xs-4 text-success">
                                    <h3>Published</h3>
                                    <h4>{{ $published_c }}</h4>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body no-padding">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_1" data-toggle="tab" aria-expanded="true">All Articles</a></li>
                                <li class=""><a href="#tab_1_2" data-toggle="tab" aria-expanded="false"> Pending</a></li>
                                <li class=""><a href="#tab_1_3" data-toggle="tab" aria-expanded="false"> Published</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tab_1_1">
                                    <ul class="list-supportTickets">
                                        @if(count($articles))
                                            @foreach($articles as $article)
                                                <li>
                                                    <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}"><img src="
                                <?php
                                                        preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $article->content, $urls);
                                                        if(isset($urls[1][0])){
                                                            echo $urls[1][0];
                                                        }else{
                                                            echo "/img/nopic.jpg";
                                                        }
                                                        ?>" alt="" class="img-responsive" /></a>
                                                    <div class="ticket-details" style="margin-left: 45px;">
                                                        <h4><a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}">{{ $article->title }} @if($article->status == "1")
                                                                    <span class="btn btn-success btn-xs">Published</span>
                                                                @elseif($article->status == "2")
                                                                    <span class="btn btn-warning btn-xs">  Pending Approval</span>
                                                                @else
                                                                    <span class="btn btn-info btn-xs">Draft</span>
                                                                @endif
                                                            </a></h4>
                                                        <p>{{ substr(strip_tags($article->content),0,200) }} ...</p><br/>
                                                        <div class="btn-group" style="margin-right: 20px;">
                                                            {{--<a href="#" class="btn btn-default btn-xs">p</a>--}}
                                                            <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}" class="btn btn-primary btn-xs">Edit</a>
                                                            @if(($article->status == "3" && $article->author == auth()->user()->id ) || auth()->user()->user_type_id == "1")
                                                                <a href="#" onclick = "deleteArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-danger btn-xs">Delete</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            {!! $articles->render() !!}
                                        @else
                                            <div class="alert alert-info">Oops, you have not created any article</div>
                                        @endif
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tab_1_2">
                                    <ul class="list-supportTickets">
                                        @if(count($pending))
                                            @foreach($pending as $article)
                                                <li>
                                                    <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}"><img src="
                                <?php
                                                        preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $article->content, $urls);
                                                        if(isset($urls[1][0])){
                                                            echo $urls[1][0];
                                                        }else{
                                                            echo "/img/nopic.jpg";
                                                        }
                                                        ?>" alt="" class="img-responsive" /></a>
                                                    <div class="ticket-details" style="margin-left: 45px;">
                                                        <h4><a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}">{{ $article->title }} @if($article->status == "1")
                                                                    <span class="btn btn-success btn-xs">Published</span>
                                                                @elseif($article->status == "2")
                                                                    <span class="btn btn-warning btn-xs">  Pending Approval</span>
                                                                @else
                                                                    <span class="btn btn-info btn-xs">Draft</span>
                                                                @endif
                                                            </a></h4>
                                                        <p>{{ substr(strip_tags($article->content),0,200) }} ...</p><br/>
                                                        <div class="btn-group" style="margin-right: 20px;">
                                                            {{--<a href="#" class="btn btn-default btn-xs">p</a>--}}
                                                            <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}" class="btn btn-primary btn-xs">Edit</a>
                                                            @if(($article->status == "3" && $article->author == auth()->user()->id ) || auth()->user()->user_type_id == "1")
                                                                <a href="#" onclick = "deleteArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-danger btn-xs">Delete</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            {!! $pending->render() !!}
                                        @else
                                            <div class="alert alert-info">Oops, you have no pending article</div>
                                        @endif
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tab_1_3">
                                    <ul class="list-supportTickets">
                                        @if(count($published))
                                            @foreach($published as $article)
                                                <li>
                                                    <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}"><img src="
                                <?php
                                                        preg_match_all('~<img.*?src=["\']+(.*?)["\']+~', $article->content, $urls);
                                                        if(isset($urls[1][0])){
                                                            echo $urls[1][0];
                                                        }else{
                                                            echo "/img/nopic.jpg";
                                                        }
                                                        ?>" alt="" class="img-responsive" /></a>
                                                    <div class="ticket-details" style="margin-left: 45px;">
                                                        <h4><a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}">{{ $article->title }} @if($article->status == "1")
                                                                    <span class="btn btn-success btn-xs">Published</span>
                                                                @elseif($article->status == "2")
                                                                    <span class="btn btn-warning btn-xs">  Pending Approval</span>
                                                                @else
                                                                    <span class="btn btn-info btn-xs">Draft</span>
                                                                @endif
                                                            </a></h4>
                                                        <p>{{ substr(strip_tags($article->content),0,200) }} ...</p><br/>
                                                        <div class="btn-group" style="margin-right: 20px;">
                                                            {{--<a href="#" class="btn btn-default btn-xs">p</a>--}}
                                                            <a href="{{ url('edit/post/'.encrypt_decrypt('encrypt',$article->id)) }}" class="btn btn-primary btn-xs">Edit</a>
                                                            @if(($article->status == "3" && $article->author == auth()->user()->id ) || auth()->user()->user_type_id == "1")
                                                                <a href="#" onclick = "deleteArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-danger btn-xs">Delete</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            {!! $published->render() !!}
                                        @else
                                            <div class="alert alert-info">Oops, no published article</div>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@endsection
