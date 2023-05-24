<?php

namespace App\Http\Controllers;

use App\Http\Resources\DroneTypeResource;
use App\Models\DroneType;
use Illuminate\Http\Request;

class DroneTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $droneType = DroneType::all();
        $droneType = DroneTypeResource::collection($droneType);
        return response()->json(['success'=>true,'data'=>$droneType]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $droneType = DroneType::create([
            'type'=>request('type')
        ]);
        return response()->json(['success'=>true,'data'=>$droneType]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
