@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Category</h4>
                
                <form class="" method="POST" action="{{route('category.add')}}">
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
                    </div>
                    <div>
                        <a href="#"><button class="btn btn-primary" type="submit">Add</button></a>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div>
    
@endsection