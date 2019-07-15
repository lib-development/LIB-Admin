@extends('layouts.dashboard')

@section('content')
    <!-- END: Side Navigation -->

    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Add Staffs</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Add Staffs</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Fill the form below to invite a staff</h3>
                        </div>
                        <div class="panel-body">

                            <form action="{{ url('/staffs/add') }}" method="post">
                                {!! csrf_field() !!}
                                @include('errors.showerrors')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required class="form-control" id="exampleInputEmail1" placeholder="Name of Staff">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Roles</label>
                                    {!! Form::select('user_type_id',$user_types,old('user_type_id'),['class' => 'form-control','required']) !!}
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Invite Staff</button>
                            </form>

                        </div>
                    </div>
                </div>



            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@endsection