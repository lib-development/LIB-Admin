@extends('layouts.dashboard')
@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Published Comment</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="#">Published Comment</a></li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Comments</h3>
                        </div>
                        <div class="panel-body">
                            @include('errors.showerrors')
                            @if($comments->count())
                                <div style="overflow-x:auto;">

                                <table class="table">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"/></th>
                                    <th width="400">Post</th>
                                    <th width="100">Name</th>
                                    <th width="100">Email</th>
                                    <th width="400">Comment</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <?php $b_c = $comment->blogContent;?>
                                        <td><input type="checkbox" name="comment_id[]" value="{{ $comment->id }}"></td>
                                        <td><a target="_blank" href="{{ url('/p/'.$b_c->year.'/'.$b_c->month.'/'.$b_c->slug) }}.html">{{ $comment->blogContent->title }}</a></td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ $comment->comments }}</td>
                                        <td>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</td>
                                        <td><a href="javascript:;" onclick="movetotrash('{{ url('decline/comment/'.encrypt_decrypt('encrypt',$comment->id)) }}')" class="btn btn-danger btn-xs">Move to Trash</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                </div>
                                {!! $comments->render() !!}
                                @else
                                <div class="alert alert-info">No Published Comment</div>
                            @endif
                        </div>
                    </div>
                </div>


            </div>


        </div>  <!--END: Content Wrap-->

    </div>
    @stop