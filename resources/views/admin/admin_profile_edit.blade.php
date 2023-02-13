@extends('admin/admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   

<div class="page-content">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile </h4>

                        <br>
                        <form action="{{ route('store.profile') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input id="name" name="name" class="form-control" type="text" placeholder="" value=" {{ $editData->name }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">User Email</label>
                                <div class="col-sm-10">
                                    <input id="email" name="email" class="form-control" type="email" placeholder="" value=" {{ $editData->email }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input id="username" name="username" class="form-control" type="text" placeholder="" value=" {{ $editData->username }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input id="image" name="profile_image" class="form-control" type="file" placeholder="" >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3 ">
                                <div class="col-sm-10 ">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <img class="rounded-circle avatar-xl" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        </div>

    </div>
</div>



<script type="text/javascript">
   $(document).ready(function(){
        $("#image").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endsection