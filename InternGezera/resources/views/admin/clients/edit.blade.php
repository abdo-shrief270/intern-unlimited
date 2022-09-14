@extends('Admin.layouts.master')

@section('title')
    Clients | Create New Client
@endsection

@section('css')

@endsection

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header">
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::current() }}">Update Client</a></li>
                    </ol>
                </nav>
            </div>

            <div class="seperator-header layout-top-spacing">
                <h4 class="">Update Client</h4>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-8 mx-auto">
                    <div class="statbox widget box box-shadow">
                        <form method="post" action="{{route('admin.client.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="client_id" value="{{$client->id}}">

                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Name</span>
                                </div>
                                <input type="text"
                                       class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror"
                                       name="name" value="{{ old('name')??$client->name }}" placeholder="Name Of Client In English"
                                       aria-label="Username">
                                @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Phone Number</span>
                                </div>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid fparsley-error parsley-error @enderror"
                                       name="phone" value="{{ old('phone')??$client->phone }}" placeholder="Phone Number Of Client"
                                       aria-label="Username">
                                @error('phone')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mx-auto col-md-6 my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Tax Number</span>
                                </div>
                                <input type="text"
                                       class="form-control @error('tax_number') is-invalid fparsley-error parsley-error @enderror"
                                       name="tax_number" value="{{ old('tax_number')??$client->tax_number }}" placeholder="Tax Number Of Client"
                                       aria-label="Username">
                                @error('tax_number')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group col-8 mb-4  mt-5">
                                <button type="submit" class="btn btn-outline-secondary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

