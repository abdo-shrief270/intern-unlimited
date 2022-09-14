@extends('Admin.layouts.master')

@section('title')
    Products | Index
@endsection

@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assetsAdmin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assetsAdmin/plugins/table/datatable/custom_dt_miscellaneous.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assetsAdmin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assetsAdmin/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::current() }}">Products</a></li>
                    </ol>
                </nav>
            </div>

            <div class="seperator-header layout-top-spacing">
                <a class="btn btn-outline-primary" href="{{route('admin.product.create')}}">Create New Product</a>
                <a class="btn btn-outline-success" href="{{route('admin.product.export')}}">Export Products</a>

            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area p-3">

                            {!! $dataTable->table(['class'=> 'table table-hover']) !!}

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{URL::asset('assetsAdmin/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{URL::asset('assetsAdmin/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assetsAdmin/plugins/table/datatable/custom_miscellaneous.js')}}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>

    </script>

{!! $dataTable->scripts() !!}

@endsection
