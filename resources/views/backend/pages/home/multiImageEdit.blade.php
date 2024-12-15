@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Multi Image Edit</h4>
                
                <form class="" method="POST" action="{{route('update.multi.image')}}" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{$imageEdit->id}}">
                        <!-- Profile image -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Image</label>
                                <input type="file" name="images" class="form-control" id="profile_image" value="">
                            </div>
                        </div>
                        <!-- Profile image show -->
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <img class="card-img img-fluid" id="image_show" src="{{asset($imageEdit->images)}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="#"><button class="btn btn-primary m-3" type="submit">Update Image</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection