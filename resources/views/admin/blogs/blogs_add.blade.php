@extends('admin.admin_master')


@section('admin')

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Blog Page</h4>

                        <form method="POST" action="{{ route('store.blog') }}" enctype="multipart/form-data">
                           @csrf



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <select name="blog_category_id" id="" class="form-select">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_title" type="text"   id="example-text-input">
                                    @error('blog_title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="home,tech" name="blog_tags" type="text"    data-role="tagsinput">

                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea   class="form-control" name="blog_description"    id="elm1">

                                    </textarea>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="blog_image" type="file"   id="image">
                                    @error('blog_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                   <img id="showImage" src="{{  url('upload/no_image.jpg') }}" alt="" class="round avatar-lg">

                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog Data">
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
