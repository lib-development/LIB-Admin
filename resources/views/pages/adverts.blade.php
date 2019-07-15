@extends('layouts.dashboard')
@section('content')
    <div class="main-container">    <!-- START: Main Container -->

        <div class="page-header">
            <h1>Adverts</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Adverts</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background: #881111">
                            <h3 class="panel-title">Adverts
                            <span>
                                <a href="{{ url('adverts/new') }}" class="btn btn-default btn-xs pull-right">
                                    Add Advert
                                </a>
                            </span>
                            </h3>
                        </div>
                        <div class="panel-body no-padding">
@include('errors.showerrors')
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <ul class="nav nav-tabs tabs-left" style="margin-top: 10px;">
                                        <li class="active"><a href="#tab_6_1" data-toggle="tab" aria-expanded="false"> Sidebar </a></li>
                                        <li class=""><a href="#tab_6_2" data-toggle="tab" aria-expanded="true"> In Btw Post </a></li>
                                        <li class=""><a href="#tab_6_3" data-toggle="tab" aria-expanded="true">RichMedia </a></li>
                                        <li class=""><a href="#tab_6_4" data-toggle="tab" aria-expanded="true"> Leaderboard </a></li>
                                        <li class=""><a href="#tab_6_5" data-toggle="tab" aria-expanded="true"> Background </a></li>
                                       </ul>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_6_1" style="overflow-y: scroll;">
                                            @if(count($sidebar) > 0)
                                            <table class="table table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                    <th>Image</th>
                                                    <th>Order</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($sidebar as $advert)
                                                      <tr>
                                                          <td>{{ $advert->title }}</td>
                                                          <td>
                                                              @if($advert->advert_type == "1")
                                                                  <a href="{{ url($advert->url) }}" target="_blank">
                                                                  <img src="{!!  $advert->image_url !!}"/>
                                                                  </a>
                                                              @else
                                                                  {!!  $advert->content !!}
                                                              @endif
                                                              </td>
                                                          <td>{{ $advert->order }}</td>
                                                          <td><a href="{{ url('/adverts/edit/'.$advert->id) }}" class="btn btn-info btn-xs">Edit</a><a href="javascript:;" onclick="deleteAdvert('{{ $advert->id }}')"  class="btn btn-danger btn-xs" style="margin-left: 10px;">Move to Trash</a></td>

                                                      </tr>
                                                  @endforeach
                                                </tbody>
                                            </table>
                                                {!! $sidebar->render() !!}
                                            @else
                                                <div class="alert alert-info">
                                                    No Advert has been created yet
                                                </div>
                                                @endif
                                        </div>
                                        <div class="tab-pane " id="tab_6_2" style="overflow-y: scroll;">
                                            @if(count($inbtw) > 0)
                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>Order</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($inbtw as $advert)
                                                        <tr>
                                                            <td>{{ $advert->title }}</td>
                                                            <td>
                                                                @if($advert->advert_type == "1")
                                                                    <a href="{{ url($advert->url) }}" target="_blank">
                                                                        <img src="{!!  $advert->image_url !!}"/>
                                                                    </a>
                                                                @else
                                                                    {!!  $advert->content !!}
                                                                @endif
                                                            </td>
                                                            <td>{{ $advert->order }}</td>
                                                            <td><a href="{{ url('/adverts/edit/'.$advert->id) }}" class="btn btn-info btn-xs">Edit</a><a href="javascript:;" onclick="deleteAdvert('{{ $advert->id }}')"  class="btn btn-danger btn-xs" style="margin-left: 10px;">Move to Trash</a></td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {!! $inbtw->render() !!}

                                            @else
                                                <div class="alert alert-info">
                                                    No Advert has been created yet
                                                </div>
                                            @endif   </div>
                                        <div class="tab-pane " id="tab_6_3" style="overflow-y: scroll;">
                                            @if(count($background) > 0)
                                                <table class="table table-responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Content</th>
                                                        <th>Order</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($background as $advert)
                                                        <tr>
                                                            <td>{{ $advert->title }}</td>
                                                            <td>
                                                                @if($advert->advert_type == "1")
                                                                    <a href="{{ url($advert->url) }}" target="_blank">
                                                                        <img src="{!!  $advert->image_url !!}"/>
                                                                    </a>
                                                                @else
                                                                    {!!  $advert->content !!}
                                                                @endif
                                                            </td>
                                                            <td>{{ $advert->order }}</td>
                                                            <td><a href="{{ url('/adverts/edit/'.$advert->id) }}" class="btn btn-info btn-xs">Edit</a><a href="javascript:;" onclick="deleteAdvert('{{ $advert->id }}')"  class="btn btn-danger btn-xs" style="margin-left: 10px;">Move to Trash</a></td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {!! $background->render() !!}

                                            @else
                                                <div class="alert alert-info">
                                                    No Advert has been created yet
                                                </div>
                                            @endif   </div>
                                        <div class="tab-pane " id="tab_6_4" style="overflow-y: scroll;">
                                            @if(count($fp) > 0)
                                                <table class="table table-responsive" >
                                                    <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th style="width: 100px;">Content</th>
                                                        <th>Order</th>
                                                        <th width="200">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($fp as $advert)
                                                        <tr>
                                                            <td>{{ $advert->title }}</td>
                                                            <td>
                                                                @if($advert->advert_type == "1")
                                                                    <a href="{{ url($advert->url) }}" target="_blank">
                                                                        <img src="{!!  $advert->image_url !!}"/>
                                                                    </a>
                                                                @else
                                                                    {!!  $advert->content !!}
                                                                @endif
                                                            </td>
                                                            <td>{{ $advert->order }}</td>
                                                            <td><a href="{{ url('/adverts/edit/'.$advert->id) }}" class="btn btn-info btn-xs">Edit</a><a href="javascript:;" onclick="deleteAdvert('{{ $advert->id }}')"  class="btn btn-danger btn-xs" style="margin-left: 10px;">Move to Trash</a></td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {!! $fp->render() !!}

                                            @else
                                                <div class="alert alert-info">
                                                    No Advert has been created yet
                                                </div>
                                            @endif   </div>
                                        <div class="tab-pane " id="tab_6_5" style="overflow-y: scroll;">
                                            @if(count($bg) > 0)
                                                <table class="table table-responsive" >
                                                    <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th style="width: 100px;">Content</th>
                                                        <th>Order</th>
                                                        <th width="200">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($bg as $advert)
                                                        <tr>
                                                            <td>{{ $advert->title }}</td>
                                                            <td>
                                                                @if($advert->advert_type == "1")
                                                                    <a href="{{ url($advert->url) }}" target="_blank">
                                                                        <img src="{!!  $advert->image_url !!}" style="height: 200px"/>
                                                                    </a>
                                                                @else
                                                                    {!!  $advert->content !!}
                                                                @endif
                                                            </td>
                                                            <td>{{ $advert->order }}</td>
                                                            <td><a href="{{ url('/adverts/edit/'.$advert->id) }}" class="btn btn-info btn-xs">Edit</a><a href="javascript:;" onclick="deleteAdvert('{{ $advert->id }}')"  class="btn btn-danger btn-xs" style="margin-left: 10px;">Move to Trash</a></td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {!! $bg->render() !!}

                                            @else
                                                <div class="alert alert-info">
                                                    No Advert has been created yet
                                                </div>
                                            @endif   </div>

                                    </div>


                                </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>


</div>

@stop

@section('script')
<script>
    function deleteAdvert(id){
        var confirmthis = confirm('Are you sure you want to delete Advert');
        if(confirmthis){
            window.location = '{{ url('adverts/delete') }}/'+ id
        }
    }
</script>

    @stop