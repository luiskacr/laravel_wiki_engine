@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Sub Category';
    $breadcrumbs = ['Home'=> route('admin.home'), $parentCategory->name .' Category'=> route('category.show',$parentCategory->id),'Sub Category'=> route('category.index') ,'Create'=>false];
@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">
            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid ">
                    <div class="float-start">
                        <h2>Create Sub Category<small><a href="{{route('category.index')}}" class=""> <i class="dripicons-arrow-thin-left "></i>Back to the Category List</a> </small></h2>
                    </div>
                </div>
            </div>

            <div class="tab-pane show active">
                <div class="row">
                    <div class="col-lg-6 mb-3 col-md-12">
                        <label for="inputName" class="form-label">Parent Category Name</label>
                        <div class="input-group">
                            <input type="text" id="inputName" name="name" placeholder="Category Name" value="{{$parentCategory->name}}" class="form-control" aria-describedby="inputGroupPrepend" disabled>
                        </div>
                    </div>
                </div>
                <form action="{{ route('subcategory.store',$parentCategory->id ) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 mb-3 col-md-12">
                            <label for="inputName" class="form-label">Sub Category Name</label>
                            <div class="input-group">
                                <input type="text" id="inputName" name="name" placeholder="Sub Category Name" value="{{old('name')}}" class="form-control" aria-describedby="inputGroupPrepend" >
                            </div>
                            @error('name')
                            <p class="text-danger">
                                * {{$message}}
                            </p>
                            @enderror
                        </div>
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
