@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Users';
    $breadcrumbs = ['Home'=> route('admin.home'),'Users'=>false];
@endphp


@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">
            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid">
                    <div class="float-start">
                        <h2>Users List</h2>
                    </div>
                    <div class="float-end">
                        <a class="text-white" href="{{ route('users.create') }}">
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Rol</th>
                                <th >Options</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                    <th>
                                        {{$user->id}}
                                    </th>
                                    <th>
                                        {{$user->name}}
                                    </th>
                                    <th>
                                        {{$user->email}}
                                    </th>
                                    <th>
                                        @if($user->active)
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
                                        @php
                                            $roles = $user->getRoleNames();
                                            foreach ($roles as $role){
                                                echo $role;
                                            }
                                        @endphp
                                    </th>
                                    <th>
                                        <a class="text-white" href="{{ route('users.show',$user->id) }} ">
                                            <button class="btn btn-info btn-sm" type="button"> Show </button>
                                        </a>
                                        <a class="text-white" href="{{ route('users.edit',$user->id) }} ">
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
