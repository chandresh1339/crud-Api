<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players=Player::all();
        return response->json($players);
    }

    /**
     * Show the form for creating a new resource.
   public function create()
    {
        
}  
    */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string'
        ]);
        
        //Run the validation
       $validator= Validator::make($request->all(),$rules);

       //Check if validation fails
        if($validator->fails){
            return response([
                'success'=>false,
                'errors'=>$validator->errors(),
            ],422);
        }
        //If validation passess the conitue with your logic
            return response([
                'success'=>true,
                'message'=>'Data validated successfully',
            ],200);
        }




    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
        return response()->json($player);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $rules = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string'
        ]);

        $player->update($rules);
        return response()->json($player,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return response()->json(null,204);

    }
}
