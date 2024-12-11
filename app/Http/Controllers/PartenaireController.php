<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PartenaireCollection;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Partenaire::all();
        if($data->count() != 0 ){
            return new PartenaireCollection($data);
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
            'url_website' =>'string',
            'description' =>'string'
        ]);
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator
             ],402);
        }
        $field = $validator->validated();
        $data = Partenaire::updateOrCreate([
            'name'    =>   $field['name'],
            'url_website' =>$field['url_website'],
            'description' => $field['description']??"",
        ]);
        return response()->json([
            'data' => $data,
            'message' =>$this->msg_success,
         ],$this->status_ok);
    }

    /**
     * Display the specified resource.
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        //
    }
}
