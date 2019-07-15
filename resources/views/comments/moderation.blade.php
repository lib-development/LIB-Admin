@extends('layouts.dashboard')
@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Moderate Comment</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">Moderate Comment</a></li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <form action="{{ url('/comments/data') }}" enctype="multipart/form-data" method="post">
                        {!! csrf_field() !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <span class="pull-right">
                                @if($comments->count() > 0)
                                <input type="submit" value="Approve" class="btn btn-success btn-xs" name="approve"/>
                                <input type="submit" value="Decline" class="btn btn-danger btn-xs" name="decline"/>
                                    @endif
                            </span>

                            </h3>
                        </div>
                        <div class="panel-body">
                            @include('errors.showerrors')
                        @if($comments->count() > 0)
                                <div style="overflow-x:auto;">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"/></th>
                                        <th width="200">Post</th>
                                        <th width="100">Name</th>
                                        <th width="100">Email</th>
                                        <th width="400">Comment</th>
                                        <th width="200">Created On</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <?php $b_c = $comment->blogContent;?>
                                            <td><input type="checkbox" name="comment_id[]" value="{{ $comment->id }}"></td>
                                            <td><a target="_blank" href="{{ url('http://lindaikejisblog.com/p/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html">{{ $comment->blogContent->title }}</a></td>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ utf8_decode($comment->comments) }}</td>
                                            <td>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</td>
                                            <td><a href="javascript:;" onclick="approveComment('{{ url('comment/approve/'.encrypt_decrypt('encrypt',$comment->id)) }}')" class="btn btn-success btn-xs">Approve</a></td>
                                            <td><a href="javascript:;" onclick="movetotrash('{{ url('comment/decline/'.encrypt_decrypt('encrypt',$comment->id)) }}')" class="btn btn-danger btn-xs">Move to Trash</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
                                @else
                                <div class="alert alert-info">No Comment pending moderation</div>
                            @endif
                        </div>
                    </div>
                    </form>
                    </div>
                </div>


            </div>


        </div>  <!--END: Content Wrap-->

    </div>
@stop