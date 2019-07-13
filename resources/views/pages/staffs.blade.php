@extends('layouts.dashboard')

@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Contact List <small class="hidden-xs">All Staff list </small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">Staffs</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                @if(count($staffs))
                    @foreach($staffs as $staff)
                        <div class="col-lg-4 col-sm-6">
                        <div class="contact-card hovercard">
                            <div class="card-background">
                                <img class="card-bkimg" alt="" src="@if($staff->img_url)
                                {{  $staff->img_url }}
                                    @else
                                {{ url('/img/avatar.png') }}
                                @endif">
                            </div>
                            <div class="useravatar">
                                <img alt="" src="@if($staff->img_url)
                                {{  $staff->img_url }}
                                @else
                                {{ url('/img/avatar.png') }}
                                @endif">
                            </div>
                            <div class="card-info">
                                <span class="card-title">{{ ucwords($staff->name) }}</span><br/>
                                <a href="{{ url('/view/profile/'.encrypt_decrypt('encrypt',$staff->id)) }}" class="btn btn-primary btn-xs text-center">View Profile</a>
                                @if(auth()->user()->email == "lindaikeji@gmail.com")
                                @if(auth()->user()->id != $staff->id)
                                <a onclick="confirm_d('{{ url('decline/user/'.$staff->id) }}')" class="btn btn-danger">Remove User</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-info">No staff has been added</div>
                @endif

            </div>


        </div>  <!--END: Content Wrap-->

    </div>

    @stop
@section('script')
    <script>
        function confirm_d(url){
            var d = confirm('Are sure you want to delete this user');
            if(d){
                window.location = url;
            }
        }
    </script>

    @endsection