<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $plan= Plan::all();
        $plan = PlanResource::collection($plan);
        return response()->json(['success'=>true,'data'=>$plan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $plan = Plan::store($request);
        return response()->json(['success'=>true,'data'=>$plan]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $plan = Plan::find($id);
        $plan = new PlanResource($plan);
        return response()->json(['success'=>true,'data'=>$plan]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $plan = Plan::store($request,$id);
        return response()->json(['success'=>true,'data'=>$plan]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $plan = Plan::find($id)->delete();
        return response()->json(['success'=>true,'data'=>$plan]);
    }


    public function planName(){
        $plan= Plan::all();
        $planName = request('name');
        $plan = Plan::where('name', $planName)->get();
        $plan = PlanResource::collection($plan);
        return response()->json(['success'=>true,'data'=>$plan]);
    }
}
