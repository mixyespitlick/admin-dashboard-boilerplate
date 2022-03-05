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
                    <form action="{{ route('weigh_in_logs.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">OR No.</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="or_no" value="{{ old('or_no') }}">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-form-label">Driver</label>
                            <div class="col-sm-10">
                                {{-- <select name="driver_id" class="form-control form-control-default">
                                    @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->fname}}
                                    </option>
                                    @endforeach
                                </select> --}}

                                <input class="form-control" type="text" name="driver_name"
                                    value="{{ old('driver_name') }}">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-form-label">Vehicle</label>
                            <div class="col-sm-8">
                                <select name="vehicle_id" class="form-control form-control-default"
                                    placeholder="Select Driver" id="vehicleSelect">
                                    {{-- <option value="">Select Vehicle </option>
                                    @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->plate_no}}
                                    </option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#vehicleModal">Add New</button>
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 col-form-label">Service Provider</label>
                            <div class="col-sm-8">
                                <select name="service_provider_id" class="form-control form-control-default"
                                    placeholder="Select Driver" id="serviceProviderSelect">
                                    {{-- <option value="">Select Service Provider </option>
                                    @foreach ($serviceProviders as $serviceProvider)
                                    <option value="{{ $serviceProvider->id }}">{{ $serviceProvider->name}}
                                    </option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#serviceProviderModal">Add
                                    New</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Collection Point</label>
                            <div class="col-sm-8">
                                <select name="collection_point_id" class="form-control form-control-default"
                                    placeholder="Select Collection Point" id="collectionPointSelect">
                                    {{-- <option value="">Select Collection Point </option>
                                    @foreach ($collectionPoints as $collectionPoint)
                                    <option value="{{ $collectionPoint->id }}">{{ $collectionPoint->name}}
                                    </option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#collectionPointModal">Add
                                    New</button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gross Weight</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="gross_weight"
                                    value="{{ old('gross_weight') }}" id="grossWeight">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Net Weight</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="net_weight"
                                    value="{{ old('net_weight') }}" id="netWeight" readonly>
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
<!-- [vehicle modal ] start -->
<div id="vehicleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vehicleModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-b-0">
                <form method="POST" id="vehicleForm">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-control-label">Plate Number</label>
                            <input class="form-control" type="text" name="plate_no" value="{{ old('plate_no') }}">

                        </div>
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label">Body No</label>
                            <input class="form-control" type="text" name="body_no" value="{{ old('body_no') }}">

                        </div>
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-label">Tare</label>
                            <input type="number" name="tare" value="{{ old('tare') }}" class="form-control">

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-label">Vehicle Type</label>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary" id="addVehicle">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- [ service provider-modal ] start -->
<div id="serviceProviderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="serviceProviderModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Service Provider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-b-0">
                <form id="serviceProviderForm">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">

                        </div>
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-control-label">Company Name</label>
                            <input class="form-control" type="text" name="company" value="{{ old('company') }}">

                        </div>
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label">Address</label>
                            <input class="form-control" type="text" name="address" value="{{ old('address') }}">

                        </div>
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-label">Service Provider Type</label>
                            <select name="service_provider_type_id" class="form-control form-control-default"
                                placeholder="Select Type">
                                <option value="">Select Service Provider Type </option>
                                @foreach ($serviceProviderTypes as $serviceProviderType)
                                <option value="{{ $serviceProviderType->id }}">{{ $serviceProviderType->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary" id="addServiceProvider">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- [ collection point-modal ] start -->
<div id="collectionPointModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="collectionPointModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Collection Point</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-b-0">
                <form method="POST" id="collectionPointForm">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">

                        </div>
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label">Description</label>
                            <input class="form-control" type="text" name="description" value="{{ old('description') }}">

                        </div>
                        {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        --}}
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-label">Tare</label>
                            <input type="number" name="tare" value="{{ old('tare') }}" class="form-control">

                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="form-label">Area</label>
                            <select name="area_id" class="form-control form-control-default" placeholder="Select Area">
                                <option value="">Select Area </option>
                                @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary" id="addCollectionPoint">Save changes</button>
            </div>
            </form>
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
<script type="text/javascript">
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#vehicleSelect").select2({
            placeholder: 'Select an vehicle',
            // minimumInputLength: 3,
            ajax: {
                url: "{{ route('vehicles.get_vehicles_ajax') }}",
                dataType: 'json',
                delay: 250, 
                cache: true,
                success: function (data) {
                    console.log('Success',data);

                },
                error: function (data) {
                    console.log('Error',data);
                 
                }
            }
        });
        $("#serviceProviderSelect").select2({
            placeholder: 'Select service provider',
            // minimumInputLength: 3,
            ajax: {
                url: "{{ route('service_providers.get_serviceprovider_ajax') }}",
                dataType: 'json',
                delay: 250, 
                cache: true,
                success: function (data) {
                    console.log('Success',data);

                },
                error: function (data) {
                    console.log('Error',data);
                 
                }
            }
        });

        $("#collectionPointSelect").select2({
            placeholder: 'Select collection point',
            // minimumInputLength: 3,
            ajax: {
                url: "{{ route('collection_points.get_collectionpoint_ajax') }}",
                dataType: 'json',
                delay: 250, 
                cache: true,
                success: function (data) {
                    console.log('Success',data);

                },
                error: function (data) {
                    console.log('Error',data);
                 
                }
            }
        });

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

        $('#addVehicle').click(function(e) {
            e.preventDefault();
            $(this).html('Saving...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                data: $('#vehicleForm').serialize(),
                url: "{{ route('vehicles.store_ajax') }}",
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    $('#vehicleForm').trigger("reset");
                    $('#vehicleModal').modal('hide');
                    console.log(res);

                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    $('#addVehicle').html('Save Changes');
                }
            });
        });

        $('#addServiceProvider').click(function(e) {
            e.preventDefault();
            $(this).html('Saving...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $.ajax({
                data: $('#serviceProviderForm').serialize(),
                url: "{{ route('service_providers.store_ajax') }}",
                type: "POST",
                dataType: 'json',
                success: function (response) {
                    $('#serviceProviderForm').trigger("reset");
                    $('#serviceProviderModal').modal('hide');
                    console.log(response);
                
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    $('#addServiceProvider').html('Save Changes');
                }
            });
        });

        $('#addCollectionPoint').click(function(e) {
            e.preventDefault();
            $(this).html('Saving...');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $.ajax({
                data: $('#collectionPointForm').serialize(),
                url: "{{ route('collection_points.store_ajax') }}",
                type: "POST",
                dataType: 'json',
                success: function (response) {
                    $('#collectionPointForm').trigger("reset");
                    $('#collectionPointModal').modal('hide');
                    console.log(response);
                
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    $('#addCollectionPoint').html('Save Changes');
                }
            });
        });
        
	});
</script>
@endpush