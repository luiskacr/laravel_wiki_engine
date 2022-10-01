@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Roles';
    $breadcrumbs = ['Home'=> route('admin.home'),'Permission'=>false];
@endphp

@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">
            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid">
                    <div class="float-start">
                        <h2>Permission List</h2>
                    </div>
                    <div class="float-end">
                        <a class="text-white" href="{{ route('permission.create') }}">
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
                            <th>Permission Name</th>
                            <th>Roles</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <th>
                                    {{$permission->name}}
                                </th>
                                <th>
                                    {{$permission->roles->count()}}
                                </th>
                                <th>
                                    <a class="text-white" href="{{ route('permission.show',$permission->id) }} ">
                                        <button class="btn btn-info btn-sm" type="button"> Show </button>
                                    </a>
                                    <a class="text-white" href="{{ route('permission.edit',$permission->id) }} ">
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

