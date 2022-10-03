@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Users';
    $breadcrumbs = ['Home'=> route('admin.home'), 'Category'=> route('category.index'), $parentCategory->name .' sub-category List'=> false ];

@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">
            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid">
                    <div class="float-start">
                        <h2>Sub Category List<small><a href="{{route('category.index')}}" class=""> <i class="dripicons-arrow-thin-left "></i>Back to the Category List</a> </small></h2>
                    </div>
                    <div class="float-end">
                        <a class="text-white" href="{{ route('subcategory.create',$parentCategory) }}">
                            <button class="btn btn-primary" type="button">
                                Create
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3> Category Parent:  {{ $parentCategory->name }}</h3>
            </div>
            <div class="tab-pane show active">
                <div class="table">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100 text-center align-middle " >
                        <thead>
                        <tr>
                            <th>Position</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Sub Categories</th>
                            <th>Post</th>
                            <th>Sub Categories Opciones</th>
                            <th >Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $category)
                            <tr>
                                <th>
                                    {{ ($category->position) /10}}
                                </th>
                                <th>
                                    {{$category->name}}
                                </th>
                                <th>
                                    @if($category->is_enable)
                                        <h4>
                                            <span class="badge bg-primary rounded-pill">Active</span>
                                        </h4>
                                    @else
                                        <h4>
                                            <span class="badge bg-danger  rounded-pill">Disabled</span>
                                        </h4>
                                    @endif
                                </th>
                                <th>
                                    {{ $category->getSubcategory($category->id)->count() }}
                                </th>
                                <th>
                                    Count Post
                                </th>
                                <th>
                                    <a class="text-white" href="{{ route('subcategory.create',$category) }} ">
                                        <button class="btn btn-primary btn-sm" type="button"> Create SubCategory </button>
                                    </a>
                                    <a class="text-white" href="{{ route('subcategory.index',$category) }} ">
                                        <button class="btn btn-info btn-sm" type="button"> Show SubCategory </button>
                                    </a>
                                </th>
                                <th>
                                    <a class="text-white" href="{{ route('subcategory.show',['category' => $parentCategory, 'subcategory'=> $category ] ) }} ">
                                        <button class="btn btn-info btn-sm" type="button"> Show </button>
                                    </a>
                                    <a class="text-white" href="{{ route('subcategory.edit',['category' => $parentCategory, 'subcategory'=> $category ] ) }} ">
                                        <button class="btn btn-success btn-sm" type="button"> Edit </button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <a class="text-white" href="{{-- --}}">
                    <button class="btn btn-primary" type="button">
                        Order Categories
                    </button>
                </a>
            </div>
        </div>
    </div>


@endsection
