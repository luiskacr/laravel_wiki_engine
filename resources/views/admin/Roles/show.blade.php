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
    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  method="post" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="danger-header-modalLabel">Modal Heading</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <h2 class="display-2"><i class="dripicons-warning "></i></h2>
                            <h3>Warning</h3>
                            <span>Are you sure you want to delete this item?</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
