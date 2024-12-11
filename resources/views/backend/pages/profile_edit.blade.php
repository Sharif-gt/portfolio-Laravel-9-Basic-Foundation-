@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Your Profile</h4>
                
                <form class="needs-validation" method="POST" action="{{route('update.profile')}}" enctype="multipart/form-data">
                     @csrf
                    <div class="row">
                       <!-- Name -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Name</label>
                                <input type="text" class="form-control" id="validationTooltip01" name="name" value="{{$data->name}}" required="">
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="validationTooltip02" value="{{$data->email}}" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Profile image -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Select Image</label>
                                <input type="file" name="image" class="form-control" id="profile_image" value="" required="">
                            </div>
                        </div>
                        <!-- Profile image show -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <img class="card-img img-fluid" id="image_show" src="{{ (!empty($data->image))?url('admin_pic/'.$data->image):url('admin_pic/image/no_img.jpg') }}" alt="Card image">
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="#"><button class="btn btn-primary" type="submit">Submit form</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection