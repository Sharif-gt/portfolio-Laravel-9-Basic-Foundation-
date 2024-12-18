@extends('backend.master')
@section('admin')

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Blog</h4>
                
                <form class="" method="POST" action="{{route('create.blog')}}" enctype="multipart/form-data">
                     @csrf

                    <div class="row">
                       <!-- Name -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Name :</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="name" value="">
                            </div>
                            @error('name')
                                <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- Category -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Category :</label>
                                <select class="form-select" name="categorie_id" aria-label="Default select example">
                                    <option selected="">Open this select menu</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('title')
                                <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- Long Description long_description -->
                       <div class="col-md-12 m-3">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Long Description :</label>
                               <textarea id="elm1" name="long_description"></textarea>
                            </div>
                            @error('long_description')
                               <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- Tags -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Tags :</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="tag" value="" data-role="tagsinput">
                            </div>
                            @error('name')
                                <span class="alert-danger">{{$message}}</span>
                            @enderror
                        </div>
                    <div class="row">
                        <!-- image -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Image :</label>
                                <input type="file" name="image" class="form-control" id="profile_image" value="" >
                            </div>
                        </div>
                        <!-- image show -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <img class="card-img img-fluid" id="image_show" src="{{ url('admin_pic/image/no_img.jpg') }}" alt="Card image">
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="#"><button class="btn btn-primary" type="submit">Create Blog</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
    
@endsection