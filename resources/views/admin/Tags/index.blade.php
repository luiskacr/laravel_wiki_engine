@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
    $title = 'Tags';
    $breadcrumbs = ['Home'=> route('admin.home'),'Tag' =>false];
@endphp

@section('content')
    <div class="card mt-3 mt-md-0">
        <div class="card-body">
            <div class="nav nav-tabs nav-bordered mb-3">
                <div class="container-fluid">
                    <div class="float-start">
                        <h2>Tag List</h2>
                    </div>
                    <div class="float-end">
                        <a class="text-white" href="{{ route('tag.create') }}">
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
                            <th>Tag Name</th>
                            <th>Post Count</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <th>
                                    {{$tag->name}}
                                </th>
                                <th>
                                    Documents count
                                </th>
                                <th>
                                    <a class="text-white" href="{{ route('tag.show',$tag->id) }} ">
                                        <button class="btn btn-info btn-sm" type="button"> Show </button>
                                    </a>
                                    <a class="text-white" href="{{ route('tag.edit',$tag->id) }} ">
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

