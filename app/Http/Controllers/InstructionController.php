<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstructionResource;
use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $instruction = Instruction::all();
        $instruction = InstructionResource::collection($instruction);
        return response()->json(['success'=>true,'data'=>$instruction]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $instruction = Instruction::create([
            "description"=>$request->description
        ]);
        return response()->json(['success'=>true,'data'=>$instruction]);
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
