@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="row no-gutters align-items-center">
                <div class="col-md-4">
                    <img class="card-img img-fluid m-3" src=" {{ (!empty($data->image))?url('admin_pic/'.$data->image):url('admin_pic/image/no_img.jpg') }} " alt="Card image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Name : {{$data->name}} </h5>
                        <h5 class="card-title">Email : {{$data->email}} </h5>
                    </div>
                </div>
                <a href="{{route('edit.profile')}}"><button type="button" class="btn btn-info btn-rounded waves-effect waves-light m-3">Edit Profile</button></a>
            </div>
        </div>
    </div>
</div>

@endsection