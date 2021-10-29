@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<div class="page-header">
    <div class="page-header-title">
        <h4>Add Collection Point</h4>
        {{-- <span>List of Drivers</span> --}}
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Table</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Basic Initialization</a>
            </li>
        </ul>
    </div>
</div>

<!-- Content Row -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5>ADD COLLECTION POINT INFORMATION</h5>
                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                    {{-- <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div> --}}
                </div>
                <div class="card-block">
                    <form action="{{ route('vehicles.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Plate Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="plate_no" value="{{ old('plate_no') }}">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Body No</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="body_no" value="{{ old('body_no') }}">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tare</label>
                            <div class="col-sm-10">
                                <input type="number" name="tare" value="{{ old('tare') }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Vehicle Type</label>
                            <div class="col-sm-10">
                                <select name="vehicle_type_id" class="form-control form-control-default"
                                    placeholder="Select Type">
                                    <option value="">Select Vehicle Type </option>
                                    @foreach ($vehicleTypes as $vehicleType)
                                    <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary m-b-0">Save</button>
                            </div>
                        </div> --}}
                </div>
                <div class="card-footer text-right">
                    <button type "submit" class="btn btn-sm btn-primary m-r-10">Submit</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection