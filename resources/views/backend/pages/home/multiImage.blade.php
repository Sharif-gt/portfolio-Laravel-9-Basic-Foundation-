@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Your About</h4>
                
                <form class="" method="POST" action="{{route('about.image')}}" enctype="multipart/form-data">
                     @csrf
                        <!-- Profile image -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Image</label>
                                <input type="file" name="images[]" class="form-control" id="profile_image" value="" multiple="">
                            </div>
                        </div>
                        <!-- Profile image show -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <img class="card-img img-fluid" id="image_show" src="{{ url('admin_pic/image/no_img.jpg') }}" alt="Card image">
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="#"><button class="btn btn-primary m-3" type="submit">Upload</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection