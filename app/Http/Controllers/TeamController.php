<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Resources\TeamCollection;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Team::all();
        if($data->count() != 0 ){
            return new TeamCollection($data);
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
            'first_name' =>'string',
            'last_name' => 'string',
            'fk_poste' =>'integer',
            'image_public' =>'file|mimes:jpeg,png,jpg|max:10302048',
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
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
