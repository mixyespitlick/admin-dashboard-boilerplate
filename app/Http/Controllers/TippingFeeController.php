<?php

namespace App\Http\Controllers;

use App\CollectionPoint;
use App\Driver;
use App\ServiceProvider;
use App\TippingFee;
use App\Vehicle;
use App\WeighInLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TippingFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tipping_fees = TippingFee::all();
        $tipping_fees = DB::table('tipping_fees')
            ->join('weighin_logs', 'weighin_logs.id', '=', 'tipping_fees.weighin_log_id')
            ->join('service_providers', 'service_providers.id', '=', 'weighin_logs.service_provider_id')
            ->leftJoin('payments', 'tipping_fees.id', '=', 'payments.tipping_fee_id')
            ->select('tipping_fees.id', 'tipping_fees.control_no', 'service_providers.name', 'tipping_fees.amount_payable', DB::raw("IFNULL(sum(payments.amount_paid),0) as paid, tipping_fees.amount_payable-IFNULL(sum(payments.amount_paid),0) as balance"))
            ->groupBy('tipping_fees.id')
            ->groupBy('tipping_fees.control_no')
            ->groupBy('service_providers.name')
            ->groupBy('tipping_fees.amount_payable')
            ->orderBy('tipping_fees.id', 'asc')
            ->get();
        return view('pages.tipping_fees.index', compact('tipping_fees'));
        // dd($tipping_fees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $vehicles = Vehicle::all();
        $serviceProviders = ServiceProvider::whereNotIn('service_provider_type_id', [1])->get();
        $today = date('Ymd');
        $currentRowCount = TippingFee::whereDate('created_at', Carbon::today())->count();
        $incrementedCurrentRowCount = $currentRowCount + 1;

        $controlNo = $today . "-" . str_pad($incrementedCurrentRowCount, 5, 0, STR_PAD_LEFT);
        return view('pages.tipping_fees.create', compact('vehicles', 'serviceProviders', 'controlNo'));
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
            // 'control_no' => 'required',
            'driver_name' => 'required',
            'vehicle_id' => 'required',
            'service_provider_id' => 'required',
            'gross_weight' => 'required',
            'net_weight' => 'required',
            'amount_payable' => 'required'
        ]);

        // $data = [
        //     'driver_id' => $request['driver_id'],
        //     'vehicle_id' => $request['vehicle_id'],
        //     'service_provider_id' => $request['service_provider_id'],
        //     'collection_point_id' => $request['collection_point_id'],
        //     'gross_weight' => $request['gross_weight'],
        //     'net_weight' => $request['net_weight'],
        //     // 'weighin_log_id' => $weighInLogID,
        //     'control_no' => $request['control_no'],
        //     'amount_payable' => $request['amount_payable'],
        // ];

        // dd($data);

        $user = Auth::user();
        $weighInLog = WeighInLog::create([
            'driver_name' => $request['driver_name'],
            'vehicle_id' => $request['vehicle_id'],
            'service_provider_id' => $request['service_provider_id'],
            'gross_weight' => $request['gross_weight'],
            'net_weight' => $request['net_weight'],
            'created_by' => $user->id
        ]);

        if ($weighInLog) {
            $weighInLogID = $weighInLog->id;
            $tippingFee = TippingFee::create([
                'weighin_log_id' => $weighInLogID,
                'control_no' => $request['control_no'],
                'amount_payable' => $request['amount_payable'],
            ]);
        }

        if ($tippingFee) {
            return redirect()->route('tipping_fees.index')->with('success', 'Tipping fee created successfully!');
        } else {
            return redirect()->route('tipping_fees.index')->with('status', 'Tipping fee creation failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TippingFee  $tippingFee
     * @return \Illuminate\Http\Response
     */
    public function show(TippingFee $tippingFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TippingFee  $tippingFee
     * @return \Illuminate\Http\Response
     */
    public function edit(TippingFee $tippingFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TippingFee  $tippingFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TippingFee $tippingFee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TippingFee  $tippingFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $tippingFee = TippingFee::find($id);
        $tippingFee->delete();
        return redirect()->route('tipping_fees.index')->with('success', 'Record successfully deleted!');
    }

    public function delete($id)
    {
        $tipping_fee = TippingFee::find($id);

        return view('pages.tipping_fees.delete', compact('tipping_fee'));
    }
}
