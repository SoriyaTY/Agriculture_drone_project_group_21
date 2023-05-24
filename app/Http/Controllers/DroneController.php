<?php

namespace App\Http\Controllers;

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
        //
        $drone = Drone::all();
        $drone = DroneResource::collection($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $drone = Drone::create([
            "amount_Time"=>request("amount_Time"),
            "speed"=>request("speed"),
            "battery"=>request("battery"),
            "user_id"=>request("user_id"),
            "droneType_id"=>request("droneType_id")
        ]);
        return response()->json(['success'=>true,'data'=>$drone]);
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
