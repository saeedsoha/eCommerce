@extends('admin/admin_master')



@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Images</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>About Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach ($multiImages as $image)                              

                                        
                                        <td>{{ $i++}}</td>
                                        <td> <img src="{{asset($image->multi_image) }}" alt="" style="width: 60px; height:50px; "> </td>
                                        <td>
                                            <a class="btn btn-info sm" href="{{ route('edit.multi_image', [$image->id]) }}" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger sm" href="{{ route('delete.multi_image', [$image->id]) }}" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('about.multi.image') }} " class="btn btn-info">Add Image</a>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end row -->
</div> <!-- end row -->




@endsection