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
                    <h5>ADD WEIGH-IN LOG INFORMATION</h5>
                    {{-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> --}}
                    {{-- <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div> --}}
                </div>
                <div class="card-block">
                    <form action="{{ route('weigh_in_logs.update_new',$weighInLog->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">OR No.</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="or_no"
                                    value="{{ old('or_no',$weighInLog->or_no) }}">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Driver</label>
                            <div class="col-sm-10">
                                {{-- <select name="driver_id" class="form-control form-control-default">
                                    @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->fname}}
                                    </option>
                                    @endforeach
                                </select> --}}

                                <input class="form-control" type="text" name="driver_name"
                                    value="{{ old('driver_name',$weighInLog->driver_name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Plate Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="plate_no"
                                    value="{{ old('plate_no',$weighInLog->vehicle->plate_no) }}" readonly>
                                <input class="form-control" type="hidden" name="vehicle_id"
                                    value="{{ old('vehicle_id',$weighInLog->vehicle_id) }}">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Body No</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="body_no"
                                    value="{{ old('body_no',$weighInLog->vehicle->body_no) }}" readonly>
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tare</label>
                            <div class="col-sm-10">
                                <input type="number" name="tare" value="{{ old('tare') }}" class="form-control"
                                    id="vehicleTare">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-form-label">Vehicle Type</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="vehicle_type_id"
                                    value="{{ old('vehicle_type_id',$weighInLog->vehicle->vehicleType->name) }}"
                                    readonly>
                                {{-- <select name="vehicle_type_id" class="form-control form-control-default"
                                    placeholder="Select Type" id="vehicleTypeSelect">
                                    <option value="">Select Vehicle Type </option>
                                    @foreach ($vehicleTypes as $vehicleType)
                                    <option value="{{ $vehicleType->id }}">{{ $vehicleType->id ==
                                        $weighInLog->vehicle->vehicle_type_id ? 'selected':'' }}{{ $vehicleType->name }}
                                    </option>
                                    @endforeach
                                </select> --}}
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Service Provider</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="service_provider_id"
                                    value="{{ old('service_provider_id',$weighInLog->serviceProvider->name) }}"
                                    readonly>
                                {{-- <select name="service_provider_id" class="form-control form-control-default"
                                    placeholder="Select Driver" id="serviceProviderSelect">
                                    <option value="">Select Service Provider </option>
                                    @foreach ($serviceProviders as $serviceProvider)
                                    <option value="{{ $serviceProvider->id }}">{{ $serviceProvider->name}}
                                    </option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Collection Point</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="collection_point_id"
                                    value="{{ old('collection_point_id',$weighInLog->collectionPoint->name) }}"
                                    readonly>
                                {{-- <select name="collection_point_id" class="form-control form-control-default"
                                    placeholder="Select Collection Point" id="collectionPointSelect">
                                    <option value="">Select Collection Point </option>
                                    @foreach ($collectionPoints as $collectionPoint)
                                    <option value="{{ $collectionPoint->id }}">{{ $collectionPoint->name}}
                                    </option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gross Weight</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="gross_weight"
                                    value="{{ old('gross_weight',$weighInLog->gross_weight) }}" id="grossWeight"
                                    readonly>
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Net Weight</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="net_weight"
                                    value="{{ old('net_weight') }}" id="netWeight">
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
                    <button type="submit" class="btn btn-sm btn-primary m-r-10">Submit</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}" />
{{--
<link rel="stylesheet" type="text/css"
    href="{{ asset('bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/multiselect/css/multi-select.css') }}" /> --}}
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

{{-- <script type="text/javascript"
    src="{{ asset('bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') }}">
</script>
<script type="text/javascript" src="{{ asset('bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
--}}
{{-- <script type="text/javascript" src="{{ asset('js/jquery.quicksearch.js') }}"></script> --}}
{{-- <script type="text/javascript" src="pages/advance-elements/select2-custom.js"></script> --}}
<script>
    $(document).ready(function() {
      
        $("#vehicleTare").keyup(function(e) {
            e.preventDefault();
            var vehicleTare = $(this).val();
            var grossWeightVal = $('#grossWeight').val();
            var netWeight = parseFloat(grossWeightVal-vehicleTare);
            $("#netWeight").val(netWeight);
        });
	});
</script>
@endpush