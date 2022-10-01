@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Roles';
    $breadcrumbs = ['Home'=> route('admin.home'),'Role'=> route('category.index'), 'Edit'=>false];
@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">

            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid ">
                    <div class="float-start">
                        <h2>Edit Category <small><a href="{{route('category.index')}}" class=""> <i class="dripicons-arrow-thin-left "></i>Back to the List</a> </small></h2>
                    </div>
                </div>
            </div>

            <div class="tab-pane show active">
                <form  method="post" action="{{ route('category.update',$category->id)  }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="inputName" class="form-label">Category Name</label>
                            <div class="input-group">
                                <input type="text" id="inputName" name="name" placeholder="Role Name" value="{{$category->name}}" class="form-control" aria-describedby="inputGroupPrepend" >
                            </div>
                            @error('name')
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
                            <input type="checkbox" name="active" data-id="{{$category->is_enable}}"  data-on="true" data-off="false"
                                   id="active" {{ $category->is_enable ? 'checked' : '' }} data-switch="bool" />
                            <label for="active" data-on-label="On" data-off-label="Off"></label>
                            @error('active')
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
@endsection
