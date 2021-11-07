@extends('layouts.admin')

@section('content')

@push('styles')
<!-- Custom styles for this page -->
<link rel="stylesheet" type="text/css"
    href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endpush

<!-- Page Heading -->
<div class="page-header">
    <div class="page-header-title">
        {{-- <h4>Driver</h4>
        <span>List of Drivers</span> --}}
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
        <div class="col-sm-12">
            @if(Session::has('success'))
            <div class="alert alert-success alet-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                @php
                Session::forget('success');
                @endphp
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h5>SERVICE PROVIDERS</h5>
                            <span>List of Service Providers</span>
                        </div>
                        <div class="col-sm-2 text-right">
                            {{-- <i class="icofont icofont-ui-edit"></i> --}}
                            <a href="{{ route('service_providers.create') }}" class="btn btn-sm btn-primary">
                                Create
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-bordered" cellspacing="0" id="serviceProviderType">
                            <thead>
                                <tr>
                                    <th> No. </th>
                                    <th> Name </th>
                                    <th> Company </th>
                                    <th> Address </th>
                                    <th> Type </th>
                                    <th>Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=0
                                @endphp
                                @foreach($serviceProviders as $serviceProvider)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        {{ $serviceProvider->name}}
                                    </td>
                                    <td>
                                        {{ $serviceProvider->company }}
                                    </td>
                                    <td>
                                        {{ $serviceProvider->address }}
                                    </td>
                                    <td>
                                        {{ $serviceProvider->serviceProviderType->name }}
                                    </td>
                                    <td>
                                        {{ $serviceProvider->status ? 'Enabled' : 'Disabled'}}
                                    </td>
                                    <td>
                                        <form action="{{ route('service_providers.destroy',$serviceProvider->id) }}"
                                            method="POST">
                                            <a href="{{ route('service_providers.edit',$serviceProvider->id) }}"
                                                class="btn btn-sm btn-warning m-r-5">
                                                <i class="icofont icofont-ui-edit"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="icofont icofont-delete-alt"></i></button>
                                            {{-- <button class="btn btn-sm-danger" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Delete"
                                                type="submit"><i class="icofont icofont-delete-alt"></i></button>
                                            --}}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- CDN jQuery Datatable -->
<!-- Page level plugins -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('pages/data-table/js/jszip.min.js') }}"></script>
<script src="{{ asset('pages/data-table/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('pages/data-table/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
{{-- <script src="{{ asset('pages/data-table/js/data-table-custom.js') }}"></script> --}}
<script>
    $(document).ready(function() {
    	$('#serviceProviderType').DataTable();
	});
</script>
@endpush