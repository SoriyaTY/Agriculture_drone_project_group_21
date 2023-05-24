<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::all();
        return response()->json(['success'=>true,'data'=>$location]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        $createLocation = Location::location($request);
        return response()->json(['success'=>true, 'data'=>$createLocation]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showLocation = Location::find($id);
        $showLocation = new LocationResource($showLocation);
        return response()->json(['success'=>true, 'data'=>$showLocation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, string $id)
    {
        $updateLocation = Location::location($request, $id);
        return response()->json(['success'=>true, 'meassage'=>'Location is alreadys update', 'data'=>$updateLocation], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Location::find($id)->delete();
        return response()->json(['meassage'=>'Location is delete'], 200);
    }
}
