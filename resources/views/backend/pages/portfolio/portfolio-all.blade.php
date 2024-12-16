@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Multi Images</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Long Description</th>
                    </tr>
                    </thead>

                    <tbody>
                        @php($i=1)
                        @foreach ($data as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->name}}</td>
                        <td class="text-wrap">{{$data->title}}</td>
                        <td><img src="{{asset($data->image)}}" alt="" class="rounded avatar-sm"></td>
                        <td class="text-wrap">{!!$data->long_description!!}</td>
                        <td> 
                            <a href="{{route('edit.portfolio',$data->id)}}" title="Edit"><i class="ri-edit-2-fill m-1"></i></a>
                            
                            <a href="{{route('delete.portfolio',$data->id)}}" title="Delete" id="delete"><i class="ri-delete-bin-2-fill m-1"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection