@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'My Profile';
    $breadcrumbs = ['Home'=> route('admin.home'),'My Profile'=> false];
@endphp

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <div class="card ">
                <div class="card-body">

                    <div class="nav nav-tabs nav-bordered mb-3">
                        <div class="container-fluid ">
                            <div class="float-start">
                                <h3>Profile Image </h3>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane show active">
                        <div class="text-center" >
                            @if($user->avatar == null)
                                <img src="https://ui-avatars.com/api/?background=727cf5&color=fff&bold=true&name={{ auth()->user()->name }}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                            @else
                                <img src="{{ $user->avatar }}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <!-- File Upload -->
                        <form action="{{ route('profile.avatar',$user->id) }}" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"
                              data-previews-container="#file-previews" enctype="multipart/form-data" data-upload-preview-template="#uploadPreviewTemplate"
                               >
                            @csrf
                            <div class="row">
                                <div class="fallback">
                                    <input name="image" type="file"  />
                                </div>

                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">
                                        (This is just a demo dropzone. Selected files are<strong>not</strong> actually uploaded.)
                                    </span>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>

                        <!-- Preview -->
                        <div class="dropzone-previews mt-3" id="file-previews"></div>

                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="card ">
                    <div class="card-body">

                        <div class="nav nav-tabs nav-bordered mb-3">
                            <div class="container-fluid ">
                                <div class="float-start">
                                    <h3>Profile Information </h3>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active">
                            <form  method="post" action="{{ route('profile.update',$user->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-6 mb-3 col-md-12">
                                        <label for="inputName" class="form-label">Name</label>
                                        <div class="input-group">
                                            <input type="text" id="inputName" name="name" placeholder="Role Name" value="{{$user->name}}" class="form-control" aria-describedby="inputGroupPrepend" >
                                        </div>
                                        @error('name')
                                        <p class="text-danger">
                                            * {{$message}}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 mb-3 col-md-12">
                                        <label for="inputName" class="form-label">Email</label>
                                        <div class="input-group">
                                            <input type="text" id="inputName" name="email" placeholder="Role Name" value="{{$user->email}}" class="form-control" aria-describedby="inputGroupPrepend" >
                                        </div>
                                        @error('email')
                                        <p class="text-danger">
                                            * {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card ">
                    <div class="card-body">

                        <div class="nav nav-tabs nav-bordered mb-3">
                            <div class="container-fluid ">
                                <div class="float-start">
                                    <h3>Change Password </h3>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane show active">
                            <form  method="post" action="{{ route('profile.password',$user->id)}}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-4 mb-3 col-md-12">
                                        <label for="inputName" class="form-label">Old Password</label>
                                        <div class="input-group">
                                            <input type="Password" id="inputName" name="current_password" placeholder="Role Name" value="" class="form-control" aria-describedby="inputGroupPrepend" >
                                        </div>
                                        @error('current_password')
                                        <p class="text-danger">
                                            * {{$message}}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="col-lg-4 mb-3 col-md-12">
                                        <label for="inputName" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="Password" id="inputName" name="new_password" placeholder="Role Name" value="" class="form-control" aria-describedby="inputGroupPrepend" >
                                        </div>
                                        @error('new_password')
                                        <p class="text-danger">
                                            * {{$message}}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="col-lg-4 mb-3 col-md-12">
                                        <label for="inputName" class="form-label">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="Password" id="inputName" name="new_confirm_password" placeholder="Role Name" value="" class="form-control" aria-describedby="inputGroupPrepend" >
                                        </div>
                                        @error('new_confirm_password')
                                        <p class="text-danger">
                                            * {{$message}}
                                        </p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
