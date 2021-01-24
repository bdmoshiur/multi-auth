@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="links" style="text-align: center">
        <a class="btn btn-primary" style="background-color: blue; color: white" href="{{ route('admin.add') }}">Add Admin Role</a>
        <a class="btn btn-info" style="background-color: gray; color: white" href="{{ route('admin.view') }}">View Admin Role</a>
        <a class="btn btn-info" style="background-color: gray; color: white" href="{{ route('admin.customer.view') }}">View Customer image</a>
    </div>
</div>
@endsection
