@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Users';
    $breadcrumbs = ['Home'=> route('admin.home'),'Users'=> route('users.index'), 'Create'=>false];
@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">
            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid">
                    <div class="float-start">
                        <h2>Create User</h2>
                    </div>
                </div>

            </div>

            <div class="tab-pane show active">
                <form action="{{ route('users.store')  }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="simpleinput" class="form-label">Name</label>
                            <input type="text" id="simpleinput" name="name" value="{{ old('name') }}" class="form-control">
                            @error('name')
                                <p class="text-danger">
                                    * {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="simpleinput" class="form-label">Email</label>
                            <input type="text" id="simpleinput" name="email" value="{{ old('email') }}" class="form-control">
                            @error('email')
                                <p class="text-danger">
                                    * {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="simpleinput" class="form-label">Password</label>
                            <input type="password" id="simpleinput" name="password"  class="form-control">
                            @error('password')
                                <p class="text-danger">
                                    * {{$message}}
                                </p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="simpleinput"  class="form-label">Password Confirmation</label>
                            <input type="password" id="simpleinput" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                                <p class="text-danger">
                                    * {{$message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3 col-md-12">
                            <div class="form-check mb-2">
                                <input type="checkbox" name="reset_password" value="true" class="form-check-input" id="customCheckcolor1" >
                                <label class="form-check-label" for="customCheckcolor1">Require password change at next login</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h4 class="mb-3">Rol</h4>
                        <div class="col-12 mb-3">
                            @foreach($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="role" name="role" value="{{$role->name}}" class="form-check-input">
                                    <label class="form-check-label" for="role">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
