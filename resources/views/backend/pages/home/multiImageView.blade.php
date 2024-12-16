@extends('backend.master')
@section('admin')

<div class="row">
    <div class="col-9">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Multi Images</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @php($i=1)
                        @foreach ($images as $img)
                    <tr>
                        <td>{{$i++}}</td>
                        <td><img src="{{asset($img->images)}}" alt="" class="rounded avatar-sm"></td>
                        <td> 
                            <a href="{{route('edit.image',$img->id)}}" title="Edit"><i class="ri-edit-2-fill m-1"></i></a>
                            
                            <a href="{{route('delete.image',$img->id)}}" title="Delete" id="delete"><i class="ri-delete-bin-2-fill m-1"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection