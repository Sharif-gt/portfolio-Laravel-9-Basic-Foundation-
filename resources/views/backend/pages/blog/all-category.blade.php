@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">All Category</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @php($i=1)
                        @foreach ($data as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->name}}</td>
                        <td> 
                            <a href="{{route('edit.category',$data->id)}}" title="Edit"><i class="ri-edit-2-fill m-1"></i></a>
                            
                            <a href="{{route('delete.category',$data->id)}}" title="Delete" id="delete"><i class="ri-delete-bin-2-fill m-1"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection