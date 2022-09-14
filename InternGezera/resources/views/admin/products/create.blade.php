@extends('Admin.layouts.master')

@section('title')
    Products | Create New Product
@endsection

@section('css')
    <link href="{{ URL::asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
        type="text/css" />

@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::current() }}">Create New
                                Product</a></li>
                    </ol>
                </nav>
            </div>

            <div class="seperator-header layout-top-spacing">
                <h4 class="">Create New Product</h4>
            </div>

            <div class="row layout-spacing">
                <div class="mx-auto">
                    <div class="statbox widget box box-shadow">
                        @include('partials.session')
                        <form class="row p-3" method="post" action="{{ route('admin.product.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Name</span>
                                </div>
                                <input type="text"
                                    class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Name Of Product In English"
                                    aria-label="Username">
                                @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Price</span>
                                </div>
                                <input type="number"
                                    class="form-control @error('buy_price') is-invalid fparsley-error parsley-error @enderror"
                                    name="buy_price" value="{{ old('buy_price') }}" placeholder="Price Of Product"
                                    aria-label="Username">
                                @error('buy_price')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Sell Price</span>
                                </div>
                                <input type="number"
                                       class="form-control @error('price') is-invalid fparsley-error parsley-error @enderror"
                                       name="price" value="{{ old('price') }}" placeholder="Sell Price Of Product"
                                       aria-label="Username">
                                @error('price')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Color</span>
                                </div>
                                <input type="color"
                                       class="form-control @error('color') is-invalid fparsley-error parsley-error @enderror"
                                       name="color" value="{{ old('color') }}"
                                       aria-label="Username">
                                @error('color')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Description</span>
                                </div>
                                <textarea
                                       class="form-control @error('description') is-invalid fparsley-error parsley-error @enderror"
                                       name="description" aria-label="Username">{{ old('description') }}</textarea>
                                @error('color')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div id="fuSingleFile" class="col-md-6 my-3 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>Product Image</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-content widget-content-area">
                                        <div class="custom-file-container" data-upload-id="myFirstImage">
                                            <label>Upload Image <a href="javascript:void(0)"
                                                    class="custom-file-container__image-clear"
                                                    title="Clear Image">x</a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                    class="custom-file-container__custom-file__custom-file-input @error('image') is-invalid fparsley-error parsley-error @enderror"
                                                    name="image" accept="image/*">
                                                @error('image')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <p>{{ $message }}</p>
                                                    </span>
                                                @enderror
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group col-sm-12 mb-4 mt-5">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>

                        </form>





                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')

    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
