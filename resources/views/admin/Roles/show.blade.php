@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Roles';
    $breadcrumbs = ['Home'=> route('admin.home'),'Role'=> route('role.index'), 'Show'=>false];
@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">

            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid ">
                    <div class="float-start">
                        <h2>Show Role <small><a href="{{route('role.index')}}" class=""> <i class="dripicons-arrow-thin-left "></i>Back to the List</a> </small></h2>
                    </div>
                </div>
            </div>

            <div class="tab-pane show active">
                <div class="row">
                    <div class="col-lg-6 mb-3 col-md-12">
                        <label for="inputName" class="form-label">Role Name</label>
                        <div class="input-group">
                            <input type="text" id="inputName" name="name" placeholder="Role Name" value="{{$role->name}}" class="form-control" aria-describedby="inputGroupPrepend" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a class="text-white" href="{{ route('role.edit',$role->id) }} ">
                                <button class="btn btn-success " type="button"> Edit </button>
                            </a>
                            <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#danger-header-modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.Crud.delete_modal')
@endsection
