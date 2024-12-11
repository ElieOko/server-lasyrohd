<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Resources\EventCollection;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Event::all();
        if($data->count() != 0 ){
            return new EventCollection($data);
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
            'type_event_id' =>'int',
            'city_id' =>'int',
            'description' =>'string',
            'short_desc' =>'string',    
            //'image_public' =>'file|mimes:jpeg,png,jpg|max:10302048',
        ]);
        if($validator->stopOnFirstFailure()->fails()){
            return response()->json([
                'message' => $validator
             ],402);
        }
        $field = $validator->validated();
        $data = Event::updateOrCreate([
            'name'    =>   $field['name'],
            'type_event_id' =>$field['type_event_id'],
            'city_id' => $field['city_id'],
            'description' => $field['description']??"",
            'short_desc' => $field['short_desc']??"",
            'image_public' => "",

        ]);
        return response()->json([
            'data' => $data,
            'message' =>$this->msg_success,
         ],$this->status_ok);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
