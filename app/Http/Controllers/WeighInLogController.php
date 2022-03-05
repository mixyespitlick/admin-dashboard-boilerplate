<?php

namespace App\Http\Controllers;

use App\Area;
use App\CollectionPoint;
use App\Driver;
use App\ServiceProvider;
use App\ServiceProviderType;
use App\Vehicle;
use App\VehicleType;
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
        $vehicleTypes = VehicleType::all();
        $serviceProviders = ServiceProvider::select("*")->where("name", "=", "MAXAN")->orWhere("name", "=", "CENRO")->get();
        $serviceProviderTypes = ServiceProviderType::all();
        $collectionPoints = CollectionPoint::all();
        $areas = Area::all();
        $id = Auth::id();
        return view('pages.weigh_in_logs.create', compact('vehicles', 'serviceProviders', 'collectionPoints', 'id', 'vehicleTypes', 'areas', 'serviceProviderTypes'));
    }

    public function create_new()
    {
        $vehicles = Vehicle::all();
        $serviceProviders = ServiceProvider::select("*")->where("name", "=", "MAXAN")->orWhere("name", "=", "CENRO")->get();
        $collectionPoints = CollectionPoint::all();
        $id = Auth::id();
        $vehicleTypes = VehicleType::select("*")->where("name", "!=", "OTHERS")->get();
        return view('pages.weigh_in_logs.create_new', compact('vehicles', 'serviceProviders', 'collectionPoints', 'id', 'vehicleTypes'));
    }

    public function store_new(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'plate_no' => 'required',
            'vehicle_type_id' => 'required',
            'service_provider_id' => 'required',
            'collection_point_id' => 'required'
        ]);

        $vehicle = Vehicle::create([

            'vehicle_type_id' => $request['vehicle_type_id'],
            'plate_no' => $request['plate_no'],
            'body_no' => $request['body_no'],
            'tare' => 0,
            'created_by' => $user->id
        ]);
        if ($vehicle) {
            $vehicleID = $vehicle->id;
            $weighInLog = WeighInLog::create([
                'vehicle_id' =>  $vehicleID,
                'service_provider_id' => $request['service_provider_id'],
                'collection_point_id' => $request['collection_point_id'],
                'or_no' => $request['or_no'],
                'gross_weight' => $request['gross_weight'],
                'net_weight' => 0,
                'created_by' => $user->id
            ]);
        }
        if ($weighInLog) {
            return redirect()->route('weigh_in_logs.index')->with('success', 'Weigh-in log added successfully!');
        } else {
            return redirect()->route('weigh_in_logs.index')->with('status', 'Weigh-in log failed to add!');
        }
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
            'gross_weight' => 'required',
            'net_weight' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $user->id;
        // HJYQNLM6BFE
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

    public function edit_new(WeighInLog $weighInLog)
    {
        $vehicles = Vehicle::all();
        $vehicleID = $weighInLog->vechicle_id;
        $serviceProviders = ServiceProvider::select("*")->where("name", "=", "MAXAN")->orWhere("name", "=", "CENRO")->get();
        $collectionPoints = CollectionPoint::all();
        $id = Auth::id();
        $vehicleTypes = VehicleType::select("*")->where("name", "!=", "OTHERS")->get();
        return view('pages.weigh_in_logs.edit_new', compact('vehicles', 'serviceProviders', 'collectionPoints', 'id', 'vehicleTypes', 'weighInLog', 'vehicleID'));
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

    public function update_new(Request $request, WeighInLog $weighInLog)
    {
        $user = Auth::user();
        $request->validate(['tare' => 'required', 'net_weight' => 'required']);
        $vehicleID = $request['vehicle_id'];
        $vehicle = Vehicle::findOrFail($vehicleID);
        if ($vehicle) {
            $vehicle->update(['tare' => $request['tare'], 'updated_by' => $user->id]);
        }
        $weighInLog->update(['net_weight' => $request['net_weight'], 'updated_by' => $user->id]);
        return redirect()->route('weigh_in_logs.index')->with('success', 'Weigh-in log updated successfully!');
        // dd($vehicleID);
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
