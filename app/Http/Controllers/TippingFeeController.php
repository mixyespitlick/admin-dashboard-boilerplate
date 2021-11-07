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

class TippingFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipping_fees = TippingFee::all();
        return view('pages.tipping_fees.index', compact('tipping_fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $serviceProviders = ServiceProvider::all();
        $collectionPoints = CollectionPoint::all();

        $today = date('Ymd');
        $currentRowCount = TippingFee::whereDate('created_at', Carbon::today())->count();
        $incrementedCurrentRowCount = $currentRowCount + 1;

        $controlNo = $today . "-" . str_pad($incrementedCurrentRowCount, 5, 0, STR_PAD_LEFT);
        return view('pages.tipping_fees.create', compact('drivers', 'vehicles', 'serviceProviders', 'collectionPoints', 'controlNo'));
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
            'driver_id' => 'required',
            'vehicle_id' => 'required',
            'service_provider_id' => 'required',
            'collection_point_id' => 'required',
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

        $id = Auth::id();
        $weighInLog = WeighInLog::create([
            'driver_id' => $request['driver_id'],
            'vehicle_id' => $request['vehicle_id'],
            'service_provider_id' => $request['service_provider_id'],
            'collection_point_id' => $request['collection_point_id'],
            'gross_weight' => $request['gross_weight'],
            'net_weight' => $request['net_weight'],
            'user_id' => $id
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
            return redirect()->route('tipping_fees.index')->with('status', 'Tipping fee created failed!');
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
    public function destroy(TippingFee $tippingFee)
    {
        //
    }
}
