@extends('layouts.dashboard')

@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>
                {{ $category->name }}
            </h1>
            <ol class="breadcrumb   ">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">
                    {{ $category->name }}
                </li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->
            <div class="row">
                <div class="col-lg-12">
                    <ul class="pagination-button">
                        @if (count($articles) >= 1)
                            <li>
                                <a {{ $backSearch === '?page=0' ? 'disabled' : '' }} class="back {{ $backSearch === '?page=0' ? 'disabled' : '' }}" href="{{ $backSearch }}">Go Back</a>
                            </li>
                            <li>
                                <a class="next" href="{{ $nextSearch }}">Next Page</a>
                            </li>
                        @endif
                    </ul>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if(count($articles) >= 1)
                                <div style="overflow-x:auto;">
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th style="width: 300px">Title</th>
                                            <th style="width: 200px">Category</th>
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
                                                        <a href="{{ url('/categories/'. $article->category->id) }}">{{ $article->category->name }}</a>
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
                                                        <div class="btn-group">
                                                            @if(($article->status == "3" && $article->author == auth()->user()->id ) || auth()->user()->user_type_id == "1")
                                                                @if($article->status == "1")
                                                                <a href="{{ url('/post/edit/'.encrypt_decrypt('encrypt',$article->id)) }}" class="btn btn-primary btn-xs">Edit</a>
                                                                {{--<a href="#" onclick = "pushArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-info btn-xs">Push</a>--}}
                                                            @endif
                                                                <a href="#" onclick = "deleteArticle('{{ encrypt_decrypt('encrypt',$article->id) }}')" class="btn btn-danger btn-xs">Delete</a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <ul class="pagination-button">
                                        @if (count($articles) >= 1)
                                        <li>
                                            <a {{ $backSearch === '?page=0' ? 'disabled' : '' }} class="back {{ $backSearch === '?page=0' ? 'disabled' : '' }}" href="{{ $backSearch }}">Go Back</a>
                                        </li>
                                            <li>
                                                <a class="next" href="{{ $nextSearch }}">Next Page</a>
                                            </li>
                                        @endif
                                    </ul>
                            @else
                                <div class="alert alert-success">No posts associated with <b>{{ $category->name }}</b></div>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>  <!--END: Content Wrap-->
            </div>  <!--END: Content Wrap-->
    </div>
@stop
