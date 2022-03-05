<?php

namespace App\Http\Controllers;

use App\ServiceProvider;
use App\ServiceProviderType;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProviders = ServiceProvider::all();
        return view('pages.service_providers.index', compact('serviceProviders'));
    }

    public function get_serviceprovider_ajax(Request $request)
    {
        $serviceProvider = ServiceProvider::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
            // ->whereNotIn('name', ['MAXAN', 'CENRO'])
            ->limit(5)
            ->get(['id', 'name as text']);

        return ['results' => $serviceProvider];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceProviderTypes = ServiceProviderType::all();
        return view('pages.service_providers.create', compact('serviceProviderTypes'));
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
            'company' => 'required',
            'address' => 'required',
            'service_provider_type_id' => 'required'
        ]);

        ServiceProvider::create($request->all());
        return redirect()->route('service_providers.index')->with('success', 'Service provider addedd successfully!');
    }

    public function store_ajax(Request $request)
    {
        $serviceProvider = $request->except(['_token']);
        ServiceProvider::updateOrCreate($serviceProvider);
        return response()->json(['success' => $serviceProvider]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        $serviceProviderTypes = ServiceProviderType::all();
        return view('pages.service_providers.edit', compact('serviceProvider', 'serviceProviderTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'address' => 'required',
            'service_provider_type_id' => 'required'
        ]);

        $serviceProvider->update($request->all());
        return redirect()->route('service_providers.index')->with('success', 'Service provider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        $serviceProvider->delete();
        return redirect()->route('service_providers.index')->with('success', 'Service provider deleted successfully!');
    }
}
