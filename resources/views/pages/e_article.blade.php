@extends('layouts.dashboard')

@section('content')
    <!-- END: Side Navigation -->
    <style>
        .bootstrap-tagsinput input {
            width: 1000px !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />

    <div class="main-container" overflow="scroll">    <!-- START: Main Container -->
        <div class="content-wrap" overflow="scroll">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit this Post
                            <span class="pull-right">
                                 <form action="{{ url('/edit/content') }}" method="post" enctype="multipart/form-data">
                                         <a onclick="close_b()" style="margin-left: 20px;" class="btn btn-default btn-xs pull-right">Close</a>

                                     @if(auth()->user()->user_type_id == "1" && $article->status == "1")
                                         <a href="{{ url('/revert/draft/'.encrypt_decrypt('encrypt',$article->id)) }}" class="btn btn-warning btn-xs pull-right">Revert to Draft</a>
                                     @endif


                                  @if(auth()->user()->user_type_id == "2")
                                    <input type="submit" onclick="clearCache();" class="btn btn-success btn-xs pull-right" name="send_admin" value="Send to Admin"/>
                                @else
                                             <input type="submit" onclick="clearCache();" name="publish"  class="btn btn-success btn-xs pull-right" style="margin-left: 10px;" value="Publish" />

                                         @if($article->schedule == null && auth()->user()->user_type_id == "1")
                                         <a href="javascript:;" onclick="clearCache();" style="margin-left: 10px;"  class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#myModal">Schedule</a>
                                        @endif

                                         @endif
                                      @if($article->status == 4)
                                          <a href="javascript:;" onclick="clearCache();" style="margin-left: 10px;"  class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#myModal">Edit Schedu</a>
                                      @endif
                                @if($article->status != 1)
                                    @if($article->status == "2")
                                        <input type="submit" onclick="clearCache();" name="save_continue2" class="btn btn-primary btn-xs pull-right" value="Save" />
                                    @else
                                        <input type="submit" onclick="clearCache();" name="save_continue" class="btn btn-primary btn-xs pull-right" value="Save" />
                                    @endif
                                @endif
                            </span>
                            </h3>
                        </div>
                        <div class="panel-body">


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
                                                    @if($article->schedule)
                                                    <label>Previously Schedule Time:  {{ $article->schedule }}</label>
                                                    @endif
                                                    <div class='input-group date dateTime-picker' data-sideBySide="1">
                                                        <input type='text' value="{{ $article->schedule }}" name="schedule" class="form-control" />
                                                        <span class="input-group-addon">
                                                <span class="sli-calendar"></span>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default">Schedule</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {!! csrf_field() !!}
                                @include('errors.showerrors')
<input type="hidden" name="id" value="{{ $article->id }}"/>
                                <div class="form-group">
                                    <input type="text" name="title" value="{{ utf8_decode($article->title) }}" required class="form-control" id="exampleInputEmail1" placeholder="Title of Article">
                                </div>
                            <div class="form-group">
                                <input type="text" name="tags" data-role="tagsinput" value="{{ utf8_decode($article->tags) }}" required class="form-control" id="header_arti" placeholder="SEO Tags">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="1" @if($article->category_id == 1)
                                        selected
                                       @endif >News</option>
                                    <option value="2" @if($article->category_id == 2)
                                    selected
                                            @endif>Entertainment</option>
                                    <option value="3" @if($article->category_id == 3)
                                    selected
                                            @endif>Politics</option>
                                    <option value="4" @if($article->category_id == 4)
                                    selected
                                            @endif>Sports</option>
                                    <option value="5" @if($article->category_id == 5)
                                    selected
                                            @endif>Weddings</option>
                                    <option value="6" @if($article->category_id == 6)
                                    selected
                                            @endif>Lifestyle</option>
                                    <option value="7" @if($article->category_id == 7)
                                    selected
                                            @endif>Fashion</option>
                                    <option value="8" @if($article->category_id == 8)
                                    selected
                                            @endif>Pictures</option>
                                    <option value="9" @if($article->category_id == 9)
                                    selected
                                            @endif>Videos</option>
                                </select>
                            </div>
                                <div class="form-group">
                                    <textarea required id="my-editor" name="content" class="form-control">{!! utf8_decode($article->content) !!}</textarea>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>



            </div>


        </div>  <!--END: Content Wrap-->

    </div>

@endsection

@include('includes.script')