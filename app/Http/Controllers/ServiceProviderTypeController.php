<?php

namespace App\Http\Controllers;

use App\ServiceProviderType;
use Illuminate\Http\Request;

class ServiceProviderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProviderTypes = ServiceProviderType::all();
        return view('pages.service_provider_types.index', compact('serviceProviderTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.service_provider_types.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        ServiceProviderType::create($request->all());
        return redirect()->route('service_provider_types.index')->with('success', 'Service provider type added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceProviderType  $serviceProviderType
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProviderType $serviceProviderType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceProviderType  $serviceProviderType
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProviderType $serviceProviderType)
    {
        return view('pages.service_provider_types.edit', compact('serviceProviderType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceProviderType  $serviceProviderType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProviderType $serviceProviderType)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $serviceProviderType->update($request->all());
        return redirect()->route('service_provider_types.index')->with('success', 'Service provider type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceProviderType  $serviceProviderType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProviderType $serviceProviderType)
    {
        $serviceProviderType->delete();
        return redirect()->route('service_provider_types.index')->with('success', 'Service provider type deleted successfully!');
    }
}
