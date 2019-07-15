@extends('layouts.dashboard')

@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Contact List <small class="hidden-xs">All Staff list </small></h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
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
                                <a href="{{ url('/profile/view/'.encrypt_decrypt('encrypt',$staff->id)) }}" class="btn btn-success btn-xs text-center">View Profile</a>
                                @if(auth()->user()->user_type_id == "1"
                                    && auth()->user()->id !== $staff->id
                                    && (auth()->user()->email === 'lindaikeji@gmail.com'
                                    || auth()->user()->email === 'o.devcode@gmail.com'))
                                {{-- @if(auth()->user()->email == "lindaikeji@gmail.com" && auth()->user()->id != $staff->id) --}}
                                <a
                                    onclick="staff_role('{{ url('staffs/role') }}/{{ encrypt_decrypt('encrypt',$staff->id) }}/{{ $staff->user_type_id == '1' ? '2' : '1' }}')"
                                    class="btn btn-danger btn-xs text-center"
                                    >Make an {{ $staff->user_type_id == '1' ? 'Editor' : 'Admin'}}
                                </a>
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
        function staff_role(url){
            var d = confirm('Are sure you want to modify this user\'s role?');
            if(d){
                window.location = url;
            }
        }
    </script>

    @endsection