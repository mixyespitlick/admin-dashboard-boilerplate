<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Imports\DriverImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('pages.drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.drivers.create');
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
            'fname' => 'required',
            'lname' => 'required'
        ]);

        Driver::create($request->all());
        return redirect()->route('drivers.index')->with('success', 'Driver created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('pages.drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required'
        ]);

        $driver->update($request->all());
        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }

    //Other functions
    public function getDriver($id)
    {
        $driver = Driver::find($id);
        if ($driver) {
            return response()->json(['status' => 200, 'vehicle' => $driver]);
        } else {
            return response()->json(['status' => 404, 'message' => 'Driver not found']);
        }
    }

    public function import()
    {
        return view('pages.drivers.import');
    }

    public function storeImport(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        $import = Excel::import(new DriverImport, $request->file('file'));
        if ($import) {
            return redirect()->route('drivers.index')->with('success', 'Drivers imported succesfully!');
        } else {
            return redirect()->route('drivers.index')->with('status', 'Drivers failed to import!');
        }
    }
}
