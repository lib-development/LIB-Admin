@extends('layouts.dashboard')

@section('content')
    <!-- END: Side Navigation -->

    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Settings</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">Settings</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Settings{Basically for SEO optimisation} <span class="pull-right"><a href="{{ url('pull/content') }}" class="btn btn-info btn-xs">Pull Data</a></span><span class="pull-right" style="margin-right: 5px;"><a href="{{ url('clear/cache') }}" class="btn btn-danger btn-xs">Update HomePage/Mobile</a></span></h3>
                        </div>
                        <div class="panel-body">
                            <!-- The Image would be here-->
                            @if($settings->blog_image)
                                <div class="row">
                                  <img src="{{ $settings->blog_image }}" style="margin: auto;height: 150px" class="img-responsive"/>
                                </div>
                                <div class="clearfix"></div>
                            @endif
                            <form action="{{ url('/update/settings') }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                @include('errors.showerrors')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title on Website</label>
                                    <input type="text" name="name" value="{{ $settings->name }}" required class="form-control" id="exampleInputEmail1" placeholder="Name of Staff">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" name="description" value="{{ $settings->description }}" required class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Number of Post on the Homepage</label>
                                    <input type="text" value="{{ $settings->number_of_post }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="number_of_post"  />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Blog Image</label>
                                    <input type="file" class="form-control" name="blog_image"  />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Blog Id</label>
                                    <input type="text" value="{{ $settings->blog_id }}" class="form-control" name="blog_id"  />
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Update Settings</button>
                            </form>

                        </div>
                    </div>
                </div>



            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@endsection