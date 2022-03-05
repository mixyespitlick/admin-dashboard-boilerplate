<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\VehicleType;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pages.vehicles.index', compact('vehicles'));
    }

    public function get_vehicles_ajax(Request $request)
    {

        $vehicles = Vehicle::where('plate_no', 'LIKE', '%' . $request->input('term', '') . '%')
            ->limit(5)
            ->get(['id', 'plate_no as text']);

        return ['results' => $vehicles];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleTypes = VehicleType::all();
        return view('pages.vehicles.create', compact('vehicleTypes'));
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
            'vehicle_type_id' => 'required',
            'plate_no' => 'required',
            'tare' => 'required',
        ]);

        $input = $request->all();
        if (empty($input['body_no'])) {
            $input['body_no'] = $input['plate_no'];
        }
        Vehicle::create($input);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle successfully added!');
    }

    public function store_ajax(Request $request)
    {
        $vehicle = $request->except(['_token']);
        if (isEmpty($vehicle['body_no'])) {
            $vehicle['body_no'] = $vehicle['plate_no'];
        }
        Vehicle::updateOrCreate($vehicle);
        return response()->json(['success' => $vehicle]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $vehicleTypes = VehicleType::all();
        return view('pages.vehicles.edit', compact('vehicle', 'vehicleTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'vehicle_type_id' => 'required',
            'plate_no' => 'required',
            'tare' => 'required',
        ]);

        $input = $request->all();
        if (empty($input['body_no'])) {
            $input['body_no'] = $input['plate_no'];
        }

        $vehicle->update($input);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
    }

    //Other functions
    public function getVehicle($id)
    {

        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return response()->json(['status' => 200, 'vehicle' => $vehicle]);
        } else {
            return response()->json(['status' => 404, 'message' => 'Vehicle not found']);
        }
    }
}
