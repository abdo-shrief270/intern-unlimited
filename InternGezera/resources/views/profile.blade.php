@extends('Admin.layouts.master')

@section('title')
    Profile | Update Data
@endsection

@section('content')
    <div id="content" class="main-content container px-5">
        <div class="layout-top-spacing">

            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                    <li class="breadcrumb-item active"><a href="{{URL::current()}}">Profile</a></li>
                </ol>
            </nav>

            <div class="seperator-header layout-top-spacing">
                <h4 class="">Update Data</h4>
            </div>

            <div class="row layout-top-spacing">
                <div class="col-lg-10 mx-auto">
                    <div class="statbox widget box box-shadow p-5">
                        <form method="post" action="{{route('admin.auth.updateData')}}">
                            @csrf
                            @method('PUT')
                            <div class="input-group mx-auto my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Name</span>
                                </div>
                                <input type="text"
                                    class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror"
                                    name="name" value="{{ old('name')?old('name'):Auth::user()->name }}" placeholder="Name Of User Ex: Abdelrahman Shrief "
                                    aria-label="Username">
                                @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mx-auto my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Email</span>
                                </div>
                                <input type="email"
                                    class="form-control @error('email') is-invalid fparsley-error parsley-error @enderror"
                                    name="email" value="{{ old('email')?old('email'):Auth::user()->email }}" placeholder="Email Of User ex: abdo@gmail.com"
                                    aria-label="Username">
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <p>{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mx-auto my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon5">Password</span>
                                </div>
                                <input type="password"
                                    class="form-control @error('password') is-invalid fparsley-error parsley-error @enderror"
                                    name="password" value="{{ old('password') }}" placeholder="Enter password ex: 12aAsd&@"
                                    aria-label="password">
                                @error('password')
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

