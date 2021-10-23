@extends('layouts.admin')

@section('content')

@push('styles')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Drivers</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
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
        <div class="card mb-4 py-3 border-bottom-primary">
            <div class="card-body">
                <table class="table table-bordered table-hovered" id="driverTable">
                    <thead>
                        <th> ID </th>
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Action </th>
                    </thead>
                    <tbody>
                        <?php 
                    foreach($drivers as $driver) : ?>
                        <tr>
                            <td> <?php echo $driver['id']; ?> </td>
                            <td> <?php echo $driver['fname']; ?> </td>
                            <td> <?php echo $driver['lname']; ?> </td>
                            <td>

                                <form action="{{ route('drivers.destroy',$driver->id) }}" method="POST">
                                    <a href="{{ route('drivers.edit',$driver->id) }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-warning"> <i
                                            class="fas fa-exclamation-triangle"></i> Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="d-none d-sm-inline-block btn btn-sm btn-danger" type="submit"> <i
                                            class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- CDN jQuery Datatable -->
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
    	$('#driverTable').DataTable();
	});
</script>
@endpush