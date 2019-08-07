@extends('layouts.dashboard')
@section('content')
    <div class="main-container">    <!-- START: Main Container -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create a new category</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/categories') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" required class="form-control" id="header_arti" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" name="description" data-role="tagsinput" required class="form-control" id="header_arti" placeholder="Category Description">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update category</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="editForm" action="{{ url('/categories') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" required class="form-control" id="editName" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" name="description" data-role="tagsinput" required class="form-control" id="editDescription" placeholder="Category Description">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="page-header">
            <h1>Categories</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Categories</li>
            </ol>
        </div>

        <div class="content-wrap">  <!--START: Content Wrap-->
            <div class="row">
                <div class="col-md-12">
                    @if (session('category'))
                        <div class="alert alert-success">
                            {{ session('category') }}
                        </div>
                    @endif
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="background: #881111">
                            <h3 class="panel-title">Categories
                            <span>
                                <a href="javascript:;" style="margin-left: 10px;" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#myModal">Add New Category</a>
                            </span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            @include('errors.showerrors')
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div style="overflow-x:auto;">
                                        <table class="table table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>Category ID.</th>
                                                    <th style="width: 200px">Name</th>
                                                    <th style="width: 300px">Description</th>
                                                    <th style="width: 400px">URL on Blog</th>
                                                    <th>Author</th>
                                                    <th>Posts Count</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @if(isset($categories) && $categories->count() > 0)
                                                    @foreach($categories as $category)
                                                        <tr>
                                                            <td>
                                                                {{ $category->id }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('/categories/' . $category->id) }}">{{ $category->name }}</a>
                                                            </td>
                                                            <td>
                                                                <p>{{ $category->description }}</p>
                                                            </td>
                                                            <td>
                                                                <a target="_blank" href="{{ env('APP_BLOG_DOMAIN') }}/categories/{{ $category->slug }}">{{ env('APP_BLOG_DOMAIN') . '/categories/'.$category->slug }}</a>
                                                            </td>

                                                            <td>
                                                                <p>
                                                                    <a href="{{ url('/profile/view/' . encrypt_decrypt('encrypt', $category->owner->id )) }}">{{ $category->owner->name }}</a>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                {{ $category->blogPosts()->count() }}
                                                            </td>
                                                            <td>
                                                                @if(($category->author_id == auth()->user()->id ) || auth()->user()->user_type_id == "1")
                                                                    <a href="#!" onclick="updateCategory({{ json_encode($category) }})" class="btn btn-primary btn-xs">Edit</a>
                                                                    <a href="{{ '/categories/delete/' . $category->id }}" class="btn btn-danger btn-xs">Delete</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @endif
                                            </tbody>
                                        </table>
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
        const headerText = document.getElementsByClassName('modal-title')[0];
        function deleteAdvert(id){
            var confirmthis = confirm('Are you sure you want to delete Advert');
            if(confirmthis){
                window.location = '{{ url('adverts/delete') }}/'+ id
            }
        }
        function updateCategory(category){
            $('#editModal').modal('toggle');
            document.getElementById('editName').value = category.name
            document.getElementById('editDescription').value = category.description
            document.getElementById('editForm').action = '/categories/edit/' + category.id
        }
    </script>
@stop
