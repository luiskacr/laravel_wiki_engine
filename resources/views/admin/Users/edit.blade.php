@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Roles';
    $breadcrumbs = ['Home'=> route('admin.home'),'Users'=> route('users.index'), 'Edit'=>false];
@endphp

@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">

            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid ">
                    <div class="float-start">
                        <h2>Edit User <small><a href="{{route('users.index')}}" class=""> <i class="dripicons-arrow-thin-left "></i>Back to the List</a> </small></h2>
                    </div>
                </div>
            </div>

            <div class="tab-pane show active">
                <form  method="post" action="{{ route('users.update',$user->id)  }}">
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
                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="inputName" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="inputName" name="password" placeholder="Password" value="" class="form-control" aria-describedby="inputGroupPrepend" >
                            </div>
                            @error('password')
                            <p class="text-danger">
                                * {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="inputName" class="form-label">Password Confirmation</label>
                            <div class="input-group">
                                <input type="password" id="inputName" name="password_confirmation" placeholder="Password Confirmation" value="" class="form-control" aria-describedby="inputGroupPrepend" >
                            </div>
                            @error('password')
                            <p class="text-danger">
                                * {{$message}}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3 col-md-12">
                            <h4>Status</h4>
                            <br>
                                <input type="checkbox" name="active" data-id="{{$user->active}}"  data-on="true" data-off="false"
                                       id="active" {{ $user->active ? 'checked' : '' }} data-switch="bool" />
                                <label for="active" data-on-label="On" data-off-label="Off"></label>
                            @error('active')
                            <p class="text-danger">
                                * {{$message}}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        @php($user_roles = $user->getRoleNames())
                        @if($user_roles != null)
                            <div class="row">
                                <h4>Permission</h4>
                                <div class="input-group col-12 mb-3">
                                    @foreach($roles as $role)
                                        @if($user_roles[0] == $role->name)
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="role" name="role" value="{{$role->name}}" class="form-check-input" checked >
                                                <label class="form-check-label" for="role">{{$role->name}}</label>
                                            </div>
                                        @else
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="role" name="role" value="{{$role->name}}" class="form-check-input"  >
                                                <label class="form-check-label" for="role">{{$role->name}}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

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

@endsection



