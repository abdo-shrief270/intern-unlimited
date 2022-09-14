@extends('Admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header" >
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Analytics</a></li>
                    </ol>
                </nav>
            </div>


        </div>
@endsection
@section('js')
<script src="{{asset('assetsAdmin/plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('assetsAdmin/assets/js/dashboard/dash_1.js')}}"></script>
<script src="{{asset('assetsAdmin/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{asset('assetsAdmin/shared/home/profitChart.js')}}"></script>
@endsection
