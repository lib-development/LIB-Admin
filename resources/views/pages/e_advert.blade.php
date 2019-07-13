@extends('layouts.dashboard')

@section('content')
    <!-- END: Side Navigation -->

    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Edit Advert</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li class="active">Edit Advert</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Post an Advert</h3>
                        </div>
                        <div class="panel-body">

                            <form action="{{ url('/edit/advert') }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                @include('errors.showerrors')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Advert Placement</label>
                                    <?php
                                    $advert_types = ['SideBar',"In between Post","Richmedia","Leaderboard","BackGround"];
                                    ?>
                                    {!! Form::select('type',$advert_types,$advert->type,['class' => 'form-control updateCha','onclick' => "updateChange()"]) !!}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Advert Type</label>
                                    <?php
                                    $advert_types = ['Html Code',"Image Upload"];
                                    ?>
                                    {!! Form::select('advert_type',$advert_types,$advert->advert_type,['class' => 'form-control advert_typ','onchange' => 'advert_t()']) !!}
                                </div>
                                <input type="hidden" name="id" value="{{ $advert->id }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input class="form-control" name="title" value="{{ $advert->title }}"/>
                                </div>
                                <div class="form-group image_upload">
                                    <label for="exampleInputEmail1">Url</label>
                                    <input class="form-control" type="url" name="url" value="{{ $advert->url }}"/>
                                </div>
                                <div class="form-group html_code">
                                    <label for="exampleInputEmail1">Advert Content</label>
                                    <textarea class="form-control" name="content">{{ $advert->content }}</textarea>
                                </div>
                                <div class="form-group image_upload">
                                    <img src="{{ $advert->image_url  }}" class="pull-right" style="height: 150px;">
                                    <label for="exampleInputEmail1">Image Upload</label>
                                    <input type="file" class="form-control" name="image" />
                                </div>
                                <div class="form-group background">
                                    <label for="exampleInputEmail1">Display Order</label>
                                    <input class="form-control" name="order" value="{{ $advert->order }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Edit Advert</button>
                            </form>

                        </div>
                    </div>
                </div>



            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            advert_t();
            updateChange();
        });

        function advert_t(){
            var advert_val = $('.advert_typ').val();
            console.log(advert_val);

            if(advert_val == 0){
                $('.html_code').show('slow');
                $('.image_upload').hide('slow');
            }else{
                $('.html_code').hide('slow');
                $('.image_upload').show('slow');
            }
        }
        function updateChange(){
            var change = $('.updateCha').val();
            if(change == "2"){
                $('.background').show('slow');
                $('.advert_typ').val(0);
                advert_t();
            }else if(change =="4"){
                $('.background').hide('slow');
                $('.advert_typ').val(1);
                advert_t();
            }else{
                $('.background').show('slow');
            }

        }
    </script>

@stop