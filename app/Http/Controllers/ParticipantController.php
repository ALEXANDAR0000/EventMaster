<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant; 

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::all();
        return response()->json($participants);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'event_id' => 'required|exists:events,id',
    ]);

    $participant = Participant::create($validatedData);

    return response()->json($participant, 201);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $participant = Participant::findOrFail($id);
    return response()->json($participant);
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $participant = Participant::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'email' => 'sometimes|required|email|max:255',
        'event_id' => 'sometimes|required|exists:events,id',
    ]);

    $participant->update($validatedData);

    return response()->json($participant);
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $participant = Participant::findOrFail($id);
    $participant->delete();

    return response()->json(null, 204);
}

}
