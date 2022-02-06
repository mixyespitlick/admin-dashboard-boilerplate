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
        // $drivers = Driver::all();
        $vehicles = Vehicle::all();
        $serviceProviders = ServiceProvider::all();
        $collectionPoints = CollectionPoint::all();
        $id = Auth::id();
        return view('pages.weigh_in_logs.create', compact('vehicles', 'serviceProviders', 'collectionPoints', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'vehicle_id' => 'required',
            'service_provider_id' => 'required',
            'collection_point_id' => 'required',
            'or_no' => 'required',
            'gross_weight' => 'required',
            'net_weight' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $user->id;

        // dd($input);

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

        $vehicles = Vehicle::all();
        $serviceProviders = ServiceProvider::all();
        $collectionPoints = CollectionPoint::all();
        return view('pages.weigh_in_logs.edit', compact('vehicles', 'serviceProviders', 'collectionPoints', 'weighInLog'));
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
        $user = Auth::user();
        $request->validate([
            'vehicle_id' => 'required',
            'service_provider_id' => 'required',
            'collection_point_id' => 'required',
            'or_no' => 'required',
            'gross_weight' => 'required',
            'net_weight' => 'required',
        ]);
        $input = $request->all();
        $input['updated_by'] = $user->id;

        // dd($input);

        $weighInLog->update($input);
        return redirect()->route('weigh_in_logs.index')->with('success', 'Weigh-in log updated successfully!');
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
