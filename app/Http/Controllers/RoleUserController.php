<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleUserRequest;
use App\Http\Resources\RoleUserResource;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roleUser= RoleUser::all();
        $roleUser = RoleUserResource::collection($roleUser);
        return response()->json(['success'=>true,'data'=>$roleUser], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleUserRequest $request)
    {
        //
        $roleUser = RoleUser::roleUser($request);
        return response()->json(['success'=>true,'data'=>$roleUser], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showRoleUser = RoleUser::find($id);
        $showRoleUser = new RoleUserResource($showRoleUser);
        return response()->json(['success'=>true,'data'=>$showRoleUser], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUserRequest $request, string $id)
    {
        $updateRoleUser = RoleUser::roleUser($request, $id);
        return response()->json(['success'=>true,'data'=>$updateRoleUser], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RoleUser::find($id)->delete();
        return response()->json(['success'=>true], 200);
    }
}
