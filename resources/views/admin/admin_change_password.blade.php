@extends('admin/admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   

<div class="page-content">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password</h4>
                       
                        @if ($errors->any())                               
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif

                        <br>
                        <form action="{{ route('update.password') }}" method="POST" >
                            @csrf
                            
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input id="oldpassword" name="oldpassword" class="form-control" type="password" placeholder="" >
    
                                </div>                                
                            </div>
                            <!-- end row -->

                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input id="newpassword" name="newpassword" class="form-control" type="password" placeholder="" >
                                </div>
                            </div>
                            <!-- end row -->

                            

                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="confrim_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input id="confrim_password" name="confrim_password" class="form-control" type="password" placeholder="" >
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        </div>

    </div>
</div>



@endsection