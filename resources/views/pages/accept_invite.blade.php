@extends('layouts.adminlayout')

@section('content')

    <div class="container">

        <div class="animatedParent">
            <div class="row">

                <div class="col-md-6 col-sm-6 hidden-xs">

                    <h3 class="sign animated flipInX">Linda Ikeji's Blog Setup</h3>
                    <p class="small animated flipInX">Kindly setup your account.</p>

                    <img src="{{ url('/img/lindaikejiblog.jpg') }}" class="img-responsive " style="margin: auto;max-width: 400px;" alt="image">

                </div>

                <div class="col-xs-12 col-md-4 col-sm-6 col-lg-4">

                    <div class="blue-line sm normal"></div>

                    <div class="signup-box">
                        <div class="logo"><img src="{{ url('/img/favicon.png') }}" alt="" style="height: 40px;"></div>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setup/account') }}">

                            {{ csrf_field() }}

<input type="hidden" name="id" value="{{ $e_id }}">

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                                <i class="fa fa-lock" aria-hidden="true"></i>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <input id="password" placeholder="Repeat password" type="password" class="form-control" name="password_confirmation" required>
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <button href="#" type="submit" class="btn btn-primary btn-block">Setup Account</button>
                        </form>
                    </div>

                    <div class="blue-line lg normal"></div>
                </div>
            </div>
        </div>
    </div>  <!-- Container End -->


@endsection
