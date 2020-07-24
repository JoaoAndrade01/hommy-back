<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;

class RepublicController extends Controller
{
    public function createRepublic(Request $request){
        $republic = new Republic;
        $republic->name = $request->name;
        $republic->street = $request->street;
        $republic->number = $request->number;
        $republic->neighborhood = $request->neighborhood;
        $republic->city = $request->city;
        $republic->state = $request->state;
        $republic->size = $request->size;
        $republic->bedrooms = $request->bedrooms;        
        $republic->livingRoom = $request->livingRoom;
        $republic->bathrooms = $request->bathrooms;
        $republic->kitchens = $request->kitchens;
        $republic->garages = $request->garages;
        $republic->save();        
        return response()->json($republic);        
    }
    public function showRepublic($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }
    public function listRepublic(){
        $republic = Republic::all();
        return response()->json([$republic]);
    }
    public function updateRepublic(Request $request, $id){
        $republic = Republic::findOrFail($id);
        if($request->name){
            $republic->name = $request->name;            
        }
        if($request->street){
            $republic->street = $request->street;            
        }
        if($request->neighborhood){
            $republic->neighborhood = $request->neighborhood;            
        }
        if($request->city){
            $republic->city = $request->city;            
        }
        if($request->state){
            $republic->state = $request->state;            
        }
        if($request->size){
            $republic->size = $request->size;            
        }
        if($request->bedrooms){
            $republic->bedrooms = $request->bedrooms;            
        }
        if($request->livingRoom){
            $republic->livingRoom = $request->livingRoom;            
        }
        if($request->bathrooms){
            $republic->bathrooms = $request->bathroom;            
        }
        if($request->kitchens){
            $republic->kitchens = $request->kitchens;            
        }
        if($request->garages){
            $republic->garages = $request->garages;            
        }
        $republic->save();
        return response()->json($republic);
               
    }
    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(['produto deletado']);
    }
    //postando uma republica
    public function addRepublic($user_id, $republic_id){
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($republic_id);
        $republic->user_id = $user_id;
        $republic->save();        
        $user->locator = 1;        
        $user->save();
        return response()->json($republic);

    }
    public function removeRepublic($user_id, $republic_id){
        $user = User::findOrFail($user_id);
        $republic = Republic::findOrFail($republic_id);
        $republic->user_id = NULL;        
        $user->locator = 0;
        $user->save();
        return response()->json($republic);
    }
    
}
