@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Password</h4>
                
                <form class="m-3" method="POST" action="{{route('update.password')}}">
                     @csrf

                     @if (count($errors))
                     @foreach ($errors->all() as $err)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{$err}}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                     @endforeach
                         
                     @endif

                    <div class="row">
                       <!-- Old Password -->
                        <div class="col-md-10">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Old Password</label>
                                <input type="password" class="form-control" id="validationTooltip01" name="old_password" value="" required="">
                            </div>
                        </div>
                        <!-- New Password -->
                        <div class="col-md-10">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" id="validationTooltip02" value="" required="">
                            </div>
                        </div>
                         <!-- Confirm Password -->
                        <div class="col-md-10">
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="validationTooltip02" value="" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <a href="#"><button class="btn btn-primary" type="submit">Change Password</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection