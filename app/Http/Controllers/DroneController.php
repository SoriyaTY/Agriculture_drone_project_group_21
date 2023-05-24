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
<<<<<<< HEAD
        //
        $drone = Drone::store($request);
        return response()->json(['success'=>true,'data'=>$drone]);
=======
        $drone = Drone::drone($request);
        return response()->json(['success'=>true,'data'=>$drone], 200);
>>>>>>> c55f1703204f8f712486a4988c1bb00fd9627af9
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
<<<<<<< HEAD
        //
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
=======
        $showDrone = Drone::find($id);
        $showDrone = new DroneResource($showDrone);
        return response()->json(['success'=>true,'data'=>$showDrone], 200);
>>>>>>> c55f1703204f8f712486a4988c1bb00fd9627af9
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, string $id)
    {
<<<<<<< HEAD
        //
        $drone = Drone::store($request,$id);
        return response()->json(['success'=>true,'message'=>'Drone update successfully','data'=>$drone]);
=======
        $updateDrone = Drone::drone($request, $id);
        return response()->json(['success'=>true,'data'=>$updateDrone], 200);
>>>>>>> c55f1703204f8f712486a4988c1bb00fd9627af9
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
<<<<<<< HEAD
        //
        $drone = Drone::find($id)->delete();
        return response()->json(['success'=>true,'message'=>'Drone delete successfully']);
=======
        Drone::find($id)->delete();
        return response()->json(['success'=>true, 'message'=>'Drone is delete'], 200);
>>>>>>> c55f1703204f8f712486a4988c1bb00fd9627af9
    }
}
