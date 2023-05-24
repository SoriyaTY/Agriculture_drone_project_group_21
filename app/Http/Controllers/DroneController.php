<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneResource;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        $drone = DroneResource::collection($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        $drone = Drone::drone($request);
        return response()->json(['success'=>true,'data'=>$drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showDrone = Drone::find($id);
        $showDrone = new DroneResource($showDrone);
        return response()->json(['success'=>true,'data'=>$showDrone], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, string $id)
    {
        $updateDrone = Drone::drone($request, $id);
        return response()->json(['success'=>true,'data'=>$updateDrone], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Drone::find($id)->delete();
        return response()->json(['success'=>true, 'message'=>'Drone is delete'], 200);
    }
}
