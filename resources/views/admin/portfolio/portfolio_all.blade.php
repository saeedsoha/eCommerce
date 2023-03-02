@extends('admin/admin_master')



@section('admin')



<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio All Data</h4>
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Portfolio Name</th>
                                <th>Portfolio Title</th>
                                <th>Portfolio Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach ($portfolio as $image)                              

                                        
                                        <td>{{ $i++}}</td>
                                        <td>{{ $image->portfolio_name}}</td>
                                        <td>{{ $image->portfolio_title}}</td>
                                        <td> <img src="{{asset($image->portfolio_image) }}" alt="" style="width: 60px; height:50px; "> </td>
                                        <td>
                                            <a class="btn btn-info sm" href="{{ route('edit.portfolio', [$image->id]) }}" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger sm" href="{{ route('delete.portfolio', [$image->id]) }}" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('add.portfolio') }} " class="btn btn-info">Change Portfolio</a>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end row -->
</div> <!-- end row -->




@endsection