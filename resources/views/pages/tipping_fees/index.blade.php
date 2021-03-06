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
                            <h5>TIPPING FEES</h5>
                            <span>List of Tipping Fees</span>
                        </div>
                        <div class="col-sm-2 text-right">
                            {{-- <i class="icofont icofont-ui-edit"></i> --}}
                            <a href="{{ route('tipping_fees.create') }}" class="btn btn-sm btn-primary">
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
                                    <th> Control No. </th>
                                    <th> Account Name </th>
                                    <th> Total Amount </th>
                                    <th> Total Amount Paid </th>
                                    <th> Total Amount Due </th>
                                    {{-- <th>Status</th> --}}
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=0
                                @endphp
                                @foreach($tipping_fees as $tipping_fee)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        {{ $tipping_fee->control_no}}
                                    </td>
                                    <td>
                                        {{ $tipping_fee->name}}
                                    </td>
                                    <td>
                                        {{ $tipping_fee->amount_payable}}
                                    </td>
                                    <td>
                                        {{ $tipping_fee->paid}}
                                    </td>
                                    <td>
                                        {{ $tipping_fee->balance}}
                                    </td>
                                    {{-- <td>
                                        {{ $tipping_fee->status ? 'Enabled' : 'Disabled'}}
                                    </td> --}}
                                    <td>

                                        @if ($tipping_fee->balance>0)
                                        <a href="{{ route('payments.generate',$tipping_fee->id) }}"
                                            class="btn btn-sm btn-info m-r-5" data-toggle="tooltip" data-placement="top"
                                            title="Pay">
                                            <i class="icofont icofont-bill-alt"></i>
                                        </a>
                                        @endif

                                        <a href="{{ route('tipping_fees.edit',$tipping_fee->id) }}"
                                            class="btn btn-sm btn-warning m-r-5" data-toggle="tooltip"
                                            data-placement="top" title="Edit">
                                            <i class="icofont icofont-ui-edit"></i>
                                        </a>
                                        {{-- <a href="{{ route('payments.generate',$tipping_fee->id) }}"
                                            class="btn btn-sm btn-info m-r-5" data-toggle="tooltip" data-placement="top"
                                            title="Pay">
                                            <i class="icofont icofont-cur-peso-true"></i>
                                        </a> --}}
                                        <a href="#" data-id={{$tipping_fee->id}}
                                            class="btn btn-sm btn-danger delete"
                                            data-toggle="modal"
                                            data-target="#deleteModal"><i class="icofont icofont-delete-alt"></i></a>
                                        {{-- <form action="{{ route('tipping_fees.destroy',$tipping_fee->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i
                                                    class="icofont icofont-delete-alt"></i></button>
                                        </form> --}}

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
    <!-- Delete Warning Modal -->
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tipping_fees.destroy', 'id') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input id="id" name="id" hidden value="">
                        <h5 class="text-center">Are you sure you want to delete this record?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete Record</button>
                </div>
                </form>
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

        $(document).on('click','.delete',function(){
             let id = $(this).attr('data-id');
             $('#id').val(id);
        });
    });
</script>
@endpush