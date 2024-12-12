<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CommunityCollection;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Community::all();
        if($data->count() != 0 ){
            return new CommunityCollection($data);
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
        $data['error'] = null ;
        $data['sys']   = "" ;
        $validator = Validator::make($request->all(),[
            'first_name' => 'string',
            'last_name' =>  'string',
            'user_id' =>    'int'
        ]);
        if(!$validator->stopOnFirstFailure()->fails()){
            $field = $validator->validated();
            $data  = Community::updateOrCreate([
                'first_name'    =>  $field['first_name'],
                'last_name'    =>  $field['last_name'],
                'user_id'    =>  $field['user_id'],
            ]);
            $data['sys'] = $bailleur;
            return $data;
        }
        $data['error']= $validator->errors()??"";
        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        //
    }
}
