<?php

namespace App\Http\Controllers;

use App\Models\TypeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TypeEventCollection;

class TypeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TypeEvent::all();
        if($data->count() != 0 ){
            return new TypeEventCollection($data);
        }
        return response()->json([
            "message"=>"Ressource not found",
        ],400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'name' =>'string',
            'description' =>'string'
        ]);
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator
             ],402);
        }
        $field = $validator->validated();
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeEvent $typeEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeEvent $typeEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeEvent $typeEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeEvent $typeEvent)
    {
        //
    }
}
