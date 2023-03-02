@extends('admin/admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   

<div class="page-content">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Home Slide Page</h4>

                        <br>
                        <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                           Id:   {{ $homeslide->id  }}
                            <input type="hidden" name="id" value="{{ $homeslide->id }} ">
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input id="title" name="title" class="form-control" type="text" placeholder="" value=" {{ $homeslide->title }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="short_title" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input id="short_title" name="short_title" class="form-control" type="text" placeholder="" value=" {{ $homeslide->short_title }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="video_url" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input id="video_url" name="video_url" class="form-control" type="text" placeholder="" value=" {{ $homeslide->video_url }} " >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input id="image" name="home_slide" class="form-control" type="file" placeholder="" >
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- start row -->
                            <div class="row mb-3 ">
                                <div class="col-sm-10 ">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    <img id="showImage" class="rounded-circle avatar-xl" src="{{ (!empty($homeslide->home_slide))? url($homeslide->home_slide):url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slid">
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