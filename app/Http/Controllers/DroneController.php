<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\FarmResource;
use App\Http\Resources\MapResource;
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
        $drone = DroneResource::collection($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DroneRequest $request)
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
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        return response()->json(['success'=>true,'data'=>$drone]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneRequest $request, string $id)
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


    //====== Download map photo the drone took of KC Farm #7====
    public function DownloadMapPhoto($name,$id){
        $farm = Farm::where('id',$id)->first();
        $map = Map::where('name',$name)->first();
        if($farm && $map){
            return $map->image;
        }
        return response()->json(['message'=>'Not found']);
    }
}
