@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Your Slider</h4>
                
                <form class="" method="POST" action="{{route('update.slider')}}" enctype="multipart/form-data">
                     @csrf

                     <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="row">
                       <!-- Title -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Title</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="title" value="{{$data->title}}">
                            </div>
                        </div>
                        <!-- Short Title -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Short Title</label>
                                <input type="text" name="short_title" class="form-control" id="validationTooltip02" value="{{$data->short_title}}">
                            </div>
                        </div>
                        <!-- Video -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Video_Url</label>
                                <input type="text" name="video" class="form-control" id="validationTooltip02" value="{{$data->video}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Profile image -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="profile_image" value="" >
                            </div>
                        </div>
                        <!-- Profile image show -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <img class="card-img img-fluid" id="image_show" src="{{ (!empty($data->image))?url($data->image):url('admin_pic/image/no_img.jpg') }}" alt="Card image">
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="#"><button class="btn btn-primary" type="submit">Update Slider</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection