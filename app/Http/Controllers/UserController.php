<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(['success'=>true,'data'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            'name'=>request('name'),
            'number_phone'=>request('number_phone'),
            'email'=>request('email'),
            'password'=>request('password'),
            'role_id'=>request('role_id')
        ]);
        return response()->json(['success'=>true,"data"=>$user]);
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
