@extends('admin.admin_master')


@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio Edit Page</h4>

                        <form method="POST" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                           @csrf

                            <input type="hidden" name="id" value="{{ $portfolio->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                <div class="col-sm-10">
                                    <input  class="form-control" name="portfolio_name" type="text"   id="example-text-input" value="{{ $portfolio->portfolio_name }}">
                                    @error('portfolio_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="portfolio_title" type="text"   id="example-text-input" value="{{ $portfolio->portfolio_title }}">
                                    @error('portfolio_title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                                <div class="col-sm-10">
                                    <textarea   class="form-control" name="portfolio_description"    id="elm1">
                                        {{ $portfolio->portfolio_description }}
                                    </textarea>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="portfolio_image" type="file"   id="image">
                                    @error('portfolio_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                   <img id="showImage" src="{{  asset($portfolio->portfolio_image) }}" alt="" class="round avatar-lg">

                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio Data">
                        </form>
                        <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>


@endsection

@section('end-script')
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){

                $('#showImage').attr('src', e.target.result)
            }

            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection
