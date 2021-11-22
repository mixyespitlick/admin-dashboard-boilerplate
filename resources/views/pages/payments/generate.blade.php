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
                    <form action="{{ route('payments.store') }}" method="POST">
                        @csrf
                        <input class="form-control" type="number" name="tipping_fee_id" value="{{ $tippingFee->id }}"
                            hidden>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tipping Fee Control No.</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="string" name="control_no"
                                    value="{{ $tippingFee->control_no }}" readonly>
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount Payable</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="amount_payable"
                                    value="{{ $tippingFee->amount_payable }}" readonly id="amount_payable">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">OR No.</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="string" name="or_no" value="{{ old('or_no') }}">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount Paid</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="amount_paid"
                                    value="{{ old('amount_paid') }}" id="amount_paid">
                            </div>
                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Balance</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="balance" value="" id="balance" readonly>
                            </div>

                            {{-- {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                            --}}
                        </div>
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
       setBalance(); 
	});

    function setBalance() {
            $("#amount_paid").keyup(function() {
                let amount_payable = $("#amount_payable").val();
                let amount_paid = $(this).val();
                let balance = parseFloat(amount_payable-amount_paid);
                $("#balance").val(parseFloat(balance));
            });
        }
</script>
@endpush