<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RepublicRequest;


class RepublicController extends Controller
{
    public function createRepublic(Request $request)
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
    public function updateRepublic(Request $request, $id)
    {
        $republic = Republic::findOrFail($id);
        $republic->updateRepublic($request);
        return response()->json($republic);
    }
    public function deleteRepublic($id)
    {
        Republic::destroy($id);
        return response()->json(['produto deletado']);
    }
    public function locatario($id)
    {
        $republic = Republic::findOrFail($id);
        $locatarios = $republic->userLocatario->get();
        return response()->json($locatarios);
    }
    public function locador($id)
    {
        $republic = Republic::findOrFail($id);
        return response()->json($republic->user);
    }
}
