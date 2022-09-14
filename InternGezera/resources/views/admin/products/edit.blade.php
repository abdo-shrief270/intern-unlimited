@extends('Admin.layouts.master')

@section('title')
    Categories | Create New Category
@endsection

@section('css')
    <link href="{{URL::asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assetsAdmin/plugins/select2/select2.min.css')}}">
@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::current() }}">Update Category</a></li>
                    </ol>
                </nav>
            </div>

            <div class="seperator-header layout-top-spacing">
                <h4 class="">Update Category</h4>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-8 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <form method="post" action="{{route('admin.category.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="category_id" value="{{$category['id']}}">
                            <div class="input-group col-8 mb-4 mx-auto mt-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">English Name</span>
                                </div>
                                <input type="text" class="form-control @error('name_en') is-invalid fparsley-error parsley-error @enderror" name="name_en" value="{{$category->getTranslation('name','en')}}" placeholder="Name Of Department In English" aria-label="Username">
                                @error('name_en')
                                <span class="invalid-feedback text-danger" role="alert">
                                       <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group col-8 mb-4 mx-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Arabic Name</span>
                                </div>
                                <input type="text" class="form-control @error('name_ar') is-invalid fparsley-error parsley-error @enderror" name="name_ar" value="{{$category->getTranslation('name', 'ar')}}" placeholder="Name Of Department In Arabic" aria-label="Username">
                                @error('name_ar')
                                <span class="invalid-feedback text-danger" role="alert">
                                       <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>

                            <div id="fuSingleFile" class="col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Category Image</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-content widget-content-area">
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" class="custom-file-container__custom-file__custom-file-input @error('category_image') is-invalid fparsley-error parsley-error @enderror" name="category_image" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"><img src="{{ $category['category_image'] }}" class="img-thumbnail" alt=""/></div>
                                            @error('category_image')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                       <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="fuSingleFile" class="col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Phone Image</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-content widget-content-area">
                                        <div class="custom-file-container" data-upload-id="mySecondImage">
                                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" class="custom-file-container__custom-file__custom-file-input @error('phone_image') is-invalid fparsley-error parsley-error @enderror" name="phone_image" accept="image/*">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"><img src="{{ $category['phone_image'] }}" class="img-thumbnail" alt=""/></div>
                                            @error('phone_image')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                       <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Size chart illustration image</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="custom-file-container" data-upload-id="myThirdImage">
                                            <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file" >
                                                <input type="file" class="custom-file-container__custom-file__custom-file-input @error('size_chart_illustration_image') is-invalid fparsley-error parsley-error @enderror" name="size_chart_illustration_image">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"><img src="{{ $category['size_chart_illustration_image'] }}" class="img-thumbnail" alt=""/></div>
                                            @error('size_chart_illustration_image')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                           <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <p>Select <code>Department</code></p>
                                <select class="form-control  @error('department') is-invalid fparsley-error parsley-error @enderror basic" name="department">
                                    <option>Select Department</option>
                                    @if (isset($departments) && $departments->count() > 0)
                                        @foreach($departments as $department)
                                            <option value="{{ $department['id'] }}" {{($department['id'] == $category['department_id']) ? 'selected' : ''}}>{{ $department['name'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('department')
                                <span class="invalid-feedback text-danger" role="alert">
                                          <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group col-8 mb-4 mx-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Priority</span>
                                </div>
                                <input type="text" class="form-control @error('priority') is-invalid fparsley-error parsley-error @enderror" name="priority" value="{{$category['priority']}}" placeholder="Enter Num From 0:4" aria-label="priority">
                                @error('priority')
                                <span class="invalid-feedback text-danger" role="alert">
                                       <p>{{ $message }}</p>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group col-8 mb-4  mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>





                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('js')
    <script src="{{URL::asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{URL::asset('assetsAdmin/plugins/select2/select2.min.js')}}"></script>
    <script src="{{URL::asset('assetsAdmin/plugins/select2/custom-select2.js')}}"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
        var thirdUpload = new FileUploadWithPreview('myThirdImage')
        //Select
        var ss = $(".basic").select2({
            tags: true,
        });
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
