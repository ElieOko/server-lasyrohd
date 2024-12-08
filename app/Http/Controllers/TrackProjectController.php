<?php

namespace App\Http\Controllers;

use App\Models\TrackProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrackProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'description' =>'string',
            'project_id' =>'int',
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
    public function show(TrackProject $trackProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrackProject $trackProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrackProject $trackProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrackProject $trackProject)
    {
        //
    }
}
