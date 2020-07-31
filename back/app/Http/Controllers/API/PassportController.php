<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
//use Illuminate\Support\Facades\Auth;
use Auth;
use DB;

class PassportController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        }
        $newuser = new User;
        $newuser->createUser($request);
        $success['token'] = $newuser->createToken('MyApp')->accessToken;
        return response()->json(['success' => $success, 'user' => $newuser], 200);
    }
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success, 'user' => $user], 200);
        } else {
            return response()->json(['error' => 'Unauthorized', 'status' => 401]);
        }
    }
    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }
    public function logout()
    {
        $accessToken = Auth::user()->token();
        DB::table('oautah_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json(['usuário deslogado'], 200);
    }
}
