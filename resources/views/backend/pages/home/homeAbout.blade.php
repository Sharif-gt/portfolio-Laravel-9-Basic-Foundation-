@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Your About</h4>
                
                <form class="" method="POST" action="{{route('update.about')}}" enctype="multipart/form-data">
                     @csrf

                     <input type="hidden" name="id" value="{{$aboutData->id}}">
                    <div class="row">
                       <!-- Title -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Title</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="title" value="{{$aboutData->title}}">
                            </div>
                        </div>
                        <!-- Short Title -->
                        <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Short Title</label>
                                <input type="text" name="short_title" class="form-control" id="validationTooltip02" value="{{$aboutData->short_title}}">
                            </div>
                        </div>
                        <!-- Short Description long_description -->
                       <div class="mb-12">
                            <label>Short Description</label>
                            <div>
                                <textarea required="" class="form-control" name="short_description" rows="5">{{$aboutData->short_description}}</textarea>
                            </div>
                        </div>
                        <!-- Long Description long_description -->
                       <div class="col-md-12 m-3">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Long Description</label>
                               <textarea id="elm1" name="long_description">{{$aboutData->long_description}}</textarea>
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
                                <img class="card-img img-fluid" id="image_show" src="{{ (!empty($aboutData->image))?url($aboutData->image):url('admin_pic/image/no_img.jpg') }}" alt="Card image">
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