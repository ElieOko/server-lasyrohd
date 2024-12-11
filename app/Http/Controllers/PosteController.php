<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;
use App\Http\Resources\PosteCollection;
use Illuminate\Support\Facades\Validator;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Poste::all();
        if($data->count() != 0 ){
            return new PosteCollection($data);
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
            'description' => 'string'
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
    public function show(Poste $poste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poste $poste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poste $poste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poste $poste)
    {
        //
    }
}
