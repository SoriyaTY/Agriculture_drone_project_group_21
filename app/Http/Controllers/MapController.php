<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\MapResource;
use App\Http\Resources\MapsPhotoResource;
use App\Models\Farm;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $map = Map::all();
        $map = MapResource::collection($map);
        return response()->json(['success' => true, 'data' => $map]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequest $request)
    {
        $createMap = Map::maps($request);
        return response()->json(['success' => true, 'data' => $createMap], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showMap = Map::find($id);
        $showMap = new MapResource($showMap);
        return response()->json(['success' => true, 'data' => $showMap], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MapRequest $request, string $id)
    {
        $updateMap = Map::maps($request, $id);
        return response()->json(['success' => true, 'message' => 'map is update', 'data' => $updateMap], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Map::find($id)->delete();
        return response()->json(['message' => 'map is delete'], 200);
    }

    //====== Download map photo the drone took of KC Farm #7====
    public function DownloadMapPhoto($name, $id)
    {
        $farm = Farm::where('id', $id)->first();
        if (!$farm) {
            return response()->json(['message' => 'Farm address not found']);
        }

        $image = Map::where('name', $name)
            ->whereHas('farm', function ($query) use ($farm) {
                $query->where('id', $farm->id);
            })
            ->value('image');

        if ($image) {
            return response()->json(['status'=>true,'image'=>$image]);
        }
        return response()->json(['message' => 'Map id not found']);
    }
    //====Delete the image of KC Farm 7====
    public function deleteImage($name, $id){

        $farm = Farm::where('id', $id)->first();
        if (!$farm) {
            return response()->json(['message' => 'Farm address not found']);
        }

        $image = Map::where('name', $name)
            ->whereHas('farm', function ($query) use ($farm) {
                $query->where('id', $farm->id);
            })
            ->value('image');

        if ($image) {
            return response()->json(['status'=>true,'image'=>$image]);
        }
        return response()->json(['message' => 'Map id not found']);
    }
}
