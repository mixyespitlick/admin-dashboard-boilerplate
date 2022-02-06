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
                    <form action="{{ route('weigh_in_logs.update',$weighInLog->id) }}" method="POST">
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
                            <label class="col-sm-2 col-form-label">Vehicle</label>
                            <div class="col-sm-10">
                                <select name="vehicle_id" class="form-control form-control-default"
                                    placeholder="Select Driver" id="vehicleSelect">
                                    <option value="">Select Vehicle </option>
                                    @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ $vehicle->id == $weighInLog->vehicle_id ?
                                        'selected':''}}>{{ $vehicle->plate_no}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Service Provider</label>
                            <div class="col-sm-10">
                                <select name="service_provider_id" class="form-control form-control-default"
                                    placeholder="Select Service Provider" id="serviceProviderSelect">
                                    <option value="">Select Service Provider </option>
                                    @foreach ($serviceProviders as $serviceProvider)
                                    <option value="{{ $serviceProvider->id }}" {{ $serviceProvider->id ==
                                        $weighInLog->service_provider_id ? 'selected':''}}>{{ $serviceProvider->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Collection Point</label>
                            <div class="col-sm-10">
                                <select name="collection_point_id" class="form-control form-control-default"
                                    placeholder="Select Collection Point" id="collectionPointSelect">
                                    <option value="">Select Collection Point </option>
                                    @foreach ($collectionPoints as $collectionPoint)
                                    <option value="{{ $collectionPoint->id }}" {{ $collectionPoint->id ==
                                        $weighInLog->collection_point_id ? 'selected':''}}>{{ $collectionPoint->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gross Weight</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="gross_weight"
                                    value="{{ old('gross_weight',$weighInLog->gross_weight) }}" id="grossWeight">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Net Weight</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="net_weight"
                                    value="{{ old('net_weight',$weighInLog->net_weight) }}" id="netWeight" readonly>
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
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
        $("#vehicleSelect").select2();
        $("#serviceProviderSelect").select2();
        $("#collectionPointSelect").select2();

        $("#vehicleSelect").on('change',function(e) {
            e.preventDefault();
            var vehicleID = $(this).val();
            var url = "{{ route('vehicle.json',':vehicleID') }}";
            url = url.replace(':vehicleID',vehicleID);
            $.ajax({
                    type: "GET",
                    dataType: 'json',
                    // url: "/dashboard/vehicles/getVehicle/"+vehicleID,
                    url: url,
                    success: function (response) {
                        var vehicleTare = response.vehicle.tare;
                        setNetWeight(vehicleTare);
                    }
                }
            );

        });
       
        function setNetWeight(tare) {
            $("#grossWeight").keyup(function() {
            var grossWeightVal = $(this).val();
            var netWeight = parseFloat(grossWeightVal-tare);
            $("#netWeight").val(netWeight);
        });
        }
        
	});
</script>
@endpush