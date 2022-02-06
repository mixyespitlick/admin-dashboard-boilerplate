<?php

namespace App\Http\Controllers;

use App\Payment;
use App\TippingFee;
use App\WeighInLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        // return view('pages.payments.index', compact('payments'));
        // $payments = TippingFee::select('service_providers.name', 'tipping_fees.control_no', 'tipping_fees.amount_payable', 'payments.id', 'payments.or_no', 'payments.amount_paid', 'payments.balance')
        //     ->join('weighin_logs', 'weighin_logs.id', '=', 'tipping_fees.weighin_log_id')
        //     ->join('service_providers', 'service_providers.id', '=', 'weighin_logs.service_provider_id')
        //     ->join('payments', 'tipping_fees.id', '=', 'payments.tipping_fee_id', 'left')
        //     ->get();

        return view('pages.payments.index', compact('payments'));

        // ->get()->toArray();
        // echo '<pre>';
        // print_r($payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function generate(Request $request)
    {
        // $tippingFee = TippingFee::find($request->id);
        $tippingFee = DB::table('tipping_fees')
            ->join('weighin_logs', 'weighin_logs.id', '=', 'tipping_fees.weighin_log_id')
            ->join('service_providers', 'service_providers.id', '=', 'weighin_logs.service_provider_id')
            ->leftJoin('payments', 'tipping_fees.id', '=', 'payments.tipping_fee_id')
            ->select('tipping_fees.id', 'tipping_fees.control_no', 'service_providers.name', DB::raw("IFNULL(sum(payments.amount_paid),0) as paid, tipping_fees.amount_payable-IFNULL(sum(payments.amount_paid),0) as amount_payable"))
            ->where('tipping_fees.id', '=', $request->id)
            ->groupBy('tipping_fees.id')
            ->groupBy('tipping_fees.control_no')
            ->groupBy('service_providers.name')
            ->groupBy('tipping_fees.amount_payable')
            ->orderBy('tipping_fees.id', 'asc')
            ->first();

        // dd($tippingFee);

        return view('pages.payments.generate', compact('tippingFee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'or_no' => 'required',
            'amount_paid' => 'required'
        ]);

        if ($request['balance'] > 0) {
            $request['is_partial'] = 1;
        }

        $payment = Payment::create($request->all());
        if ($payment) {
            return redirect()->route('payments.index')->with('success', 'Payment added successfully!');
        } else {
            return redirect()->route('payments.index')->with('status', 'Failed to save record!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
