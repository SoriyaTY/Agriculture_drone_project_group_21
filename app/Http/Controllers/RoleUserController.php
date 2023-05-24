<?php

namespace App\Http\Controllers;

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
        return response()->json(['success'=>true,'data'=>$roleUser]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $roleUser = RoleUser::create([
            "role"=>request("role")
        ]);
        return response()->json(['success'=>true,'data'=>$roleUser]);
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
