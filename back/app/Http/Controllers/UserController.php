<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RepublicRequest;
use App\Http\Requests\CommentRequest;
use App\Republic;
use App\Comment;
use App\Http\Resources\User as UserResource;



class UserController extends Controller
{
    public function createUser(UserRequest $request)
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
    public function visualizeRepublic($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user->Republic);
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
    public function desapropriar($user_id, $republic_id)
    {
        $user = User::findOrFail($user_id);
        $user->desapropriar($republic_id);
        return response()->json($user);
    }
    public function anunciar(RepublicRequest $request, $user_id)
    {
        $republic = new Republic;    
        $republic->createRepublic($request);    
        $republic->anunciar($user_id);       
        return response()->json($republic);
    }
    public function comentar(CommentRequest $request, $user_id, $republic_id)
    {
        $comment = new Comment;
        $comment->createComment($request);
        $comment->comentar($user_id, $republic_id);
        return response()->json($comment);
    }
   
    public function favoritar($user_id, $republic_id)
    {
        $user = User::findOrFail($user_id);
        $user->favoritar($republic_id);
        return response()->json([$republic_id, 'Republica Favoritada!']);
    }
    public function desfavoritar($user_id, $republic_id)
    {
        $user = User::findOrFail($user_id);
        $user->desfavoritar($republic_id);
        return response()->json([$republic_id, 'Republica Desfavoritada!']);
    }
 
}
