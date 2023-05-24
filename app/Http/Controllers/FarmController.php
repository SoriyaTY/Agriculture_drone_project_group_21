<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use Illuminate\Http\Request;
use Whoops\Run;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Farm::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FarmRequest $request)
    {
        $createFarm = Farm::farms($request);
        return response()->json(['success'=>true, 'data'=>$createFarm], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showFarm = Farm::find($id);
        $showFarm = new FarmResource($showFarm);
        return response()->json(['success'=>true, 'data'=>$showFarm], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmRequest $request, string $id)
    {
        // dd(34);
        $updateFarm = Farm::farms($request, $id);
        return response()->json(['success'=>true, 'message'=> "Farm is update" ,'data'=>$updateFarm], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Farm::find($id)->delete();
        return response()->json([ 'message'=> "Farm is delete"], 200);
    }
}
