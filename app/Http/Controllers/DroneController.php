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
        $drone = Drone::store($request);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $drone = Drone::store($request,$id);
        return response()->json(['success'=>true,'message'=>'Drone update successfully','data'=>$drone]);
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
}
