@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Portfolio</h4>
                
                <form class="" method="POST" action="{{route('portfolio.add')}}" enctype="multipart/form-data">
                     @csrf

                     <input type="hidden" name="id" value="">
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
                        <!-- title -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Title :</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="title" value="">
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
                        <a href="#"><button class="btn btn-primary" type="submit">Update About</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
    
@endsection