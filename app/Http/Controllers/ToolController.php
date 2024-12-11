<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use App\Http\Resources\ToolCollection;
use Illuminate\Support\Facades\Validator;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tool::all();
        if($data->count() != 0 ){
            return new ToolCollection($data);
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
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'description' => 'required',
            'url_website' =>'required',
            //'logo' =>'mimetypes:jpeg,png,jpg|max:10302048',
        ]);
        
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator->errors()
             ],402);
        }
        $field = $validator->validated();
        //$original_name = $request->file('logo')->getClientOriginalName();
        // if ($request->hasFile('logo')) {
            //$path = $request->logo->storeAs("public/", $original_name);
            $data = Tool::updateOrCreate([
                'name'           =>   $field['name'],
                'description'    =>   $field['description']??"",
                'logo'           =>   "",
                'url_website'    =>   $field['url_website'],
            ]);
            return response()->json([
                'data' => $data,
                'message' =>$this->msg_success,
             ],$this->status_ok);
        //}
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        //
    }
}
