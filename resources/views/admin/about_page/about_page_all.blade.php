@extends('admin/admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   


<div class="page-content">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Page</h4>

                        <br>
                        <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            <input type="hidden" name="id" value="{{ $aboutData->id }} ">
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input id="title" name="title" class="form-control" type="text" placeholder="" value=" {{ $aboutData->title }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <!-- start row Short Title -->
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input id="short_title" name="short_title" class="form-control" type="text" placeholder="" value=" {{ $aboutData->short_title }} " >
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- start row Short Description-->
                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input id="short_description" name="short_description" class="form-control" type="text" placeholder="" value=" {{ $aboutData->short_description }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <!-- start row Short Description-->
                            <div class="row mb-3">
                                <label for="long_description" class="col-sm-2 col-form-label">LOng Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description">{!! $aboutData->long_description !!} </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input id="image" name="about_image" class="form-control" type="file" placeholder="" >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3 ">
                                <div class="col-sm-10 ">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <img id="showImage" class="rounded-circle avatar-xl" src="{{ (!empty($aboutData->about_image))? url($aboutData->about_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About page">
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