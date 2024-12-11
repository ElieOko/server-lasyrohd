<?php

namespace App\Http\Controllers;

use App\Models\TrackProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TrackProjectCollection;

class TrackProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TrackProject::all();
        if($data->count() != 0 ){
            return new TrackProjectCollection($data);
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
            'description' =>'string',
            'project_id' =>'int',
        ]);
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator
             ],402);
        }
        $field = $validator->validated();
        $data = TrackProject::updateOrCreate([
            'name'              =>  $field['name'],
            'project_id'        =>  $field['project_id'],
            'description'       =>  $field['description']??"",
        ]);
        return response()->json([
            'data' => $data,
            'message' =>$this->msg_success,
         ],$this->status_ok);
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
