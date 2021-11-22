<?php

namespace App\Http\Controllers;

use App\CollectionPoint;
use App\Driver;
use App\ServiceProvider;
use App\Vehicle;
use App\WeighInLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeighInLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weighInLogs = WeighInLog::all();
        return view('pages.weigh_in_logs.index', compact('weighInLogs'));
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
        $id = Auth::id();
        return view('pages.weigh_in_logs.create', compact('drivers', 'vehicles', 'serviceProviders', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'driver_id' => 'required',
            'vehicle_id' => 'required',
            'service_provider_id' => 'required',
            'or_no' => 'required',
            'gross_weight' => 'required',
            'net_weight' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = $id;
        WeighInLog::create($input);
        return redirect()->route('weigh_in_logs.index')->with('success', 'Weigh-in log added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WeighInLog  $weighInLog
     * @return \Illuminate\Http\Response
     */
    public function show(WeighInLog $weighInLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WeighInLog  $weighInLog
     * @return \Illuminate\Http\Response
     */
    public function edit(WeighInLog $weighInLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WeighInLog  $weighInLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeighInLog $weighInLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WeighInLog  $weighInLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeighInLog $weighInLog)
    {
        //
    }
}
