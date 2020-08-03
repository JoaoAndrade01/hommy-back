<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RepublicRequest;
use App\Http\Resources\Republics as RepublicsResource;


class RepublicController extends Controller
{

    public function createRepublic(RepublicRequest $request)
    {
        $republic = new Republic;
        $republic->createRepublic($request);
        return response()->json($republic);
    }
    public function showRepublic($id)
    {
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }
    public function listRepublic()
    {
        $republic = Republic::all();
        return response()->json([$republic]);
    }
    public function updateRepublic(RepublicRequest $request, $id)
    {
        $republic = Republic::findOrFail($id);
        $republic->updateRepublic($request);
        return response()->json($republic);
    }
    public function deleteRepublic($id)
    {
        Republic::destroy($id);
        return response()->json(['republica deletada']);
    }
    public function deletedRepublic()
    {
        $republic = Republic::onlyTrashed()->get();
        return response()->json($republic);
    }
    public function restoreRepublic($id)
    {
        $republic = Republic::onlyTrashed()->findOrFail($id);
        $republic->restore();
        return response()->json($republic);
    }

    public function restoreAllRepublic()
    {
        $republic_all = Republic::onlyTrashed()->get();
        $republic = Republic::onlyTrashed();
        $republic->restore();
        return response()->json($republic_all);
    }

    public function locatario($id)
    {
        $republic = Republic::findOrFail($id);
        $locatarios = $republic->userLocatario()->get();
        return response()->json($locatarios);
    }
    public function locador($id)
    {
        $republic = Republic::findOrFail($id);
        return response()->json($republic->user);
    }
    public function commentRepublic($id)
    {
        $republic = Republic::findOrFail($id);
        $comments = $republic->Comments()->get();
        return response()->json($comments);
    }
    public function search(Request $request)
    {
        $queryRepublic = Republic::query(); // Gera um objeto do tipo Builder
        if ($request->bedrooms) {            
            $bedrooms = $request->bedrooms;            
            $queryRepublic->where('bedrooms', '>=', $bedrooms);
        }
        if ($request->street) {
            $street = $request->street;
            $queryRepublic->where('street', 'LIKE', '%'.$street.'%');
        }
        if($request->id){
            $id = $request->id;
            $comments = Comment::with('republic')->where('republic_id', $id)->count();
            return response()->json($comments);                                      
        }        
        $paginas = $queryRepublic->paginate(3);        
        $search = RepublicsResource::collection($paginas);
        $ultima_pagina = $paginas->lastPage();
        return response()->json([$search,'Última página:'.$ultima_pagina]);
    }
}
