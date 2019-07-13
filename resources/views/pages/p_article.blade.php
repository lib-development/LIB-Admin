@extends('layouts.dashboard')

@section('content')
    <style>
        .contentPost { display:none;}
        .bootstrap-tagsinput input {
            width: 1000px !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <!-- END: Side Navigation -->

    <div class="main-container" overflow="scroll">    <!-- START: Main Container -->

        <div class="content-wrap" overflow="scroll">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="contentPost pull-right">
                                <img src="{{ url('img/loading.gif') }}" style="height:20px;"/>
                            </div>

                            <form action="{{ url('/add/content') }}" method="post" enctype="multipart/form-data">


                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Select Publish Date</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class='input-group date dateTime-picker' data-sideBySide="1">
                                                        <input type='text' name="schedule" class="form-control" />
                                                        <span class="input-group-addon">
                                                <span class="sli-calendar"></span>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default" >Schedule</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            <h3 class="panel-title">Create a Post

                                <span class="pull-right">
                                                                             {{--<a onclick="close_b()" style="margin-left: 20px;" class="btn btn-default btn-xs pull-right">Close</a>--}}

                                @if(auth()->user()->user_type_id == "2")
                                <a href="javascript:;" class="btn btn-success btn-xs pull-right" onclick="sendAdmin();">Send to Admin</a>
                                <input type="submit"  class="bbb btn btn-success btn-xs pull-right hidden" name="send_admin" style="margin-left: 10px;" value="Send to Admin"/>
                                        <input type="submit"  name="save_continue" class="btn btn-xs btn-primary pull-right" value="Save and Continue Later" />

                                    @else
                                        <a onclick="clearCache('{{ url('/articles') }}');" style="margin-left: 10px;"  class="btn btn-default btn-xs pull-right">Close</a>
                                        <a href="javascript:;"  style="margin-left: 10px;"  class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#myModal">Schedule</a>
                                        <input type="submit" onclick="clearCache();" style="margin-left: 10px;" name="save_continue" class="btn btn-xs btn-primary pull-right" value="Save" />

                                        <input type="submit" name="publish" onclick="clearCache();" class="btn btn-xs btn-success  pull-right" style="margin-left: 10px;" value="Publish" />

                                    @endif
</span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            @include('errors.showerrors')
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <input type="text" name="title" value="{{ utf8_decode(old('title')) }}" required class="form-control" id="header_arti" placeholder="Title of Article">
                                </div>
                            <div class="form-group">
                                <input type="text" name="tags" data-role="tagsinput" value="{{ utf8_decode(old('tags')) }}" required class="form-control" id="header_arti" placeholder="SEO Tags">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                  <select name="category_id" class="form-control">
                                      <option value="1">News</option>
                                      <option value="2">Entertainment</option>
                                      <option value="3">Politics</option>
                                      <option value="4">Sports</option>
                                      <option value="5">Weddings</option>
                                      <option value="6">Lifestyle</option>
                                      <option value="7">Fashion</option>
                                      <option value="8">Pictures</option>
                                      <option value="9">Videos</option>
                                  </select>
                             </div>
                                <div class="form-group">
                                    <textarea required id="my-editor" name="content" class="form-control">{!! utf8_decode(old('content')) !!}</textarea>
                                 </div>
                             <a href="javascript:;" onclick="realign()" class="pull-right btn btn-info btn-xs">Realign up <i class="fa fa-arrow-circle-up"></i></a>


                            </form>

                        </div>
                    </div>
                </div>



            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@endsection
@include('includes.script')