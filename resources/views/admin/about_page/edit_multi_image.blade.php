@extends('admin/admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   
{{-- @php
    $showimage  = $multiImage->multi_images;
@endphp --}}

<div class="page-content">
    <div class="container-fluid">
        
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">





                        <h4 class="card-title">Edit Image -> Image Number: {{ $selectesImage->id }}</h4>

                        <br>
                        <form action="{{ route('update.multi.image', $selectesImage->id   ) }}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            <input type="hidden" name="id" value="{{ $selectesImage->id }} ">

                            <!-- start Image Input -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input id="image" name="multiImage" class="form-control" type="file">
                                </div>
                            </div>
                            <!-- end Image Input -->

                            <!-- start Show Image -->
                            <div class="row mb-3 ">
                                <div class="col-sm-10 ">
                                    <label for="showImage" class="col-sm-2 col-form-label"></label>
                                    {{-- <img id="showImage" class="rounded-circle avatar-xl" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap"> --}}
                                    <img id="showImage" class="rounded-circle avatar-xl" src="{{ asset($selectesImage->multi_image) }}" alt="Card image cap">
                                    </div>
                            </div>
                            <!-- end Show Image -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Multi Image">
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