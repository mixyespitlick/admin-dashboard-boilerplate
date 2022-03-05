<?php

namespace App\Http\Controllers;

use App\Area;
use App\CollectionPoint;
use Illuminate\Http\Request;

class CollectionPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collectionPoints = CollectionPoint::all();
        return view('pages.collection_points.index', compact('collectionPoints'));
    }

    public function get_collectionpoint_ajax(Request $request)
    {
        $serviceProvider = CollectionPoint::where('name', 'LIKE', '%' . $request->input('term', '') . '%')
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
        $areas = Area::all();
        return view('pages.collection_points.create', compact('areas'));
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
            'description' => 'required',
            'area_id' => 'required'
        ]);

        CollectionPoint::create($request->all());
        return redirect()->route('collection_points.index')->with('success', 'Collection point added succesfully!');
    }

    public function store_ajax(Request $request)
    {
        $collectionPoint = $request->except(['_token']);
        CollectionPoint::updateOrCreate($collectionPoint);
        return response()->json(['success' => $collectionPoint]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function show(CollectionPoint $collectionPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(CollectionPoint $collectionPoint)
    {
        return view('pages.collection_points.edit', compact('collectionPoint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CollectionPoint $collectionPoint)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'area_id' => 'required'
        ]);
        $collectionPoint->update($request->all());
        return redirect()->route('collection_points.index')->with('success', 'Collection point updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollectionPoint $collectionPoint)
    {
        $collectionPoint->delete();
        return redirect()->route('collection_points.index')->with('success', 'Collection point deleted successfully!');
    }
}
