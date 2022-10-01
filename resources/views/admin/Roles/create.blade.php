@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Roles';
    $breadcrumbs = ['Home'=> route('admin.home'),'Role'=> route('role.index'), 'Create'=>false];
@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">

            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid ">
                    <div class="float-start">
                        <h2>Create Role<small><a href="{{route('role.index')}}" class=""> <i class="dripicons-arrow-thin-left "></i>Back to the List</a> </small></h2>
                    </div>
                </div>
            </div>

            <div class="tab-pane show active">
                <form action="{{ route('role.store')  }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="inputName" class="form-label">Role Name</label>
                            <div class="input-group">
                                <input type="text" id="inputName" name="name" placeholder="Role Name" value="{{old('name')}}" class="form-control" aria-describedby="inputGroupPrepend" >
                            </div>
                            @error('name')
                                <p class="text-danger">
                                    * {{$message}}
                                </p>
                            @enderror
                        </div>


                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
