@extends('admin.admin_template')

{{-- Administrative Panel Required Fields  --}}
@php
        $title = 'Home';
        $breadcrumbs = ['Home'=> false];
@endphp

@section('content')
    <h1>Home</h1>

    @php
        $user = auth()->user();
        echo $user;
    @endphp

@endsection
