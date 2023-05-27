<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Requests\InstructGivenPlan;
use App\Http\Requests\InsturctGivenPlan;
use App\Http\Resources\DroneLocationResource;
use App\Http\Resources\DroneResource;
use App\Http\Resources\ShowDroneResource;
use App\Models\Drone;
use App\Models\Farm;
use App\Models\Map;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drone = Drone::all();
        $drone_id = request('drone_id');
        $drone = Drone::where('drone_id', 'like', "%".$drone_id."%")->get();
        $drone = DroneResource::collection($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
    {
        $drone = Drone::store($request);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drone = Drone::find($id);
        $drone = new ShowDroneResource($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, string $name)
    {
        $drone = Drone::where('drone_id', $name)->first();
        $drone->update($request->all()); 
        return response()->json(['success' => true, 'message' => 'Drone updated successfully', 'data' => $drone]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $drone = Drone::find($id)->delete();
        return response()->json(['success'=>true,'message'=>'Drone delete successfully']);
    }

    //======Show current latitude+longitude of drone D23=======
    public function droneLocation()
    {
        $droneLocation = Drone::all();
        $drone_id = request('drone_id');
        $droneLocation = Drone::where('drone_id', 'like', "%".$drone_id."%")->get();
        $droneLocation = DroneLocationResource::collection($droneLocation);
        return response()->json(['success'=>true,'data'=>$droneLocation]);
    }


    // update instrution with given plan 
    public function updateInstrution(InstructGivenPlan $request, string $name)
    {
        $drone = Drone::where('drone_id', $name)->first();
        $drone->update($request->all()); 
        return response()->json(['success' => true, 'message' => 'Drone updated successfully', 'data' => $drone]);
    }

}
