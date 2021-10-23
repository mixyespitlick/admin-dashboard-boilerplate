@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Driver</h1>
    <a href="{{ route('driver.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
            class="fas fa-backward fa-sm text-white-50"></i> Back</a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card mb-4 py-3 border-bottom-primary">
            <div class="card-body">
                <form action="{{ route('driver.store') }}" method="POST">
                    @csrf
                    <div class="for-group mb-3">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control">
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!} --}}
                    </div>
                    <div class="for-group mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control">
                    </div>
                    <div class="for-group mb-3">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

