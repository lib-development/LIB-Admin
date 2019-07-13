@extends('layouts.dashboard')

@section('content')
    <!-- END: Side Navigation -->

    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Settings</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">Comment Settings</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Comment Settings</h3>
                        </div>
                        <div class="panel-body">
                            <!-- The Image would be here-->
                            <form action="{{ url('/update/comments') }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                @include('errors.showerrors')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Block Comment that Contain</label>
                                    <textarea name="comments" class="form-control">{{ $settings->comments }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Block Email</label>
                                    <textarea name="emails" class="form-control">{{ $settings->emails }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Update Comment Settings</button>
                            </form>

                        </div>
                    </div>
                </div>



            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@endsection