@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Users';
    $breadcrumbs = ['Home'=> route('admin.home'),'Category'=>false];
@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">
            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid">
                    <div class="float-start">
                        <h2>Categories List</h2>
                    </div>
                    <div class="float-end">
                        <a class="text-white" href="{{-- --}}">
                            <button class="btn btn-primary" type="button">
                                Order Categories
                            </button>
                        </a>
                        <a class="text-white" href="{{ route('category.create') }}">
                            <button class="btn btn-primary" type="button">
                                Create
                            </button>
                        </a>
                    </div>
                </div>

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
                            <th >Options</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
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
                                        Count Categories
                                    </th>
                                    <th>
                                        Count Post
                                    </th>
                                    <th>
                                        <a class="text-white" href="{{ route('category.show',$category->id) }} ">
                                            <button class="btn btn-info btn-sm" type="button"> Show </button>
                                        </a>
                                        <a class="text-white" href="{{ route('category.edit',$category->id) }} ">
                                            <button class="btn btn-success btn-sm" type="button"> Edit </button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
