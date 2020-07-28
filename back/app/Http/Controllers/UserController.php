<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Republic;


class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $user = new User;
        $user->createUser($request);
        return response()->json($user);
    }
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    public function listUser()
    {
        $user = User::all();
        return response()->json([$user]);
    }
    public function updateUser(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->updateUser($request);
        return response()->json($user);
    }
    public function deleteUser($id)
    {
        User::destroy($id);
        return response()->json(['usuario deletado']);
    }
    public function alugar($user_id, $republic_id)
    {
        $user = User::findOrFail($user_id);
        $user->alugar($republic_id);
        return response()->json($user);
    }
    public function anunciar($user_id, $republic_id)
    {
        $republic = Republic::findOrFail($republic_id);
        $republic->anunciar($user_id);
        return response()->json($republic);
    }
}
