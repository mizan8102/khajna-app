<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\auth\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpseclib3\Crypt\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password' => 'required',
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'message' => 'Email or password is incorrect'
            ], 422);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        // if (!$user->is_admin) {
        //     Auth::logout();
        //     return response([
        //         'message' => 'You don\'t have permission to authenticate as admin'
        //     ], 403);
        // }
//        if (!$user->email_verified_at) {
//            Auth::logout();
//            return response([
//                'message' => 'Your email address is not verified'
//            ], 403);
//        }
        $token = $user->createToken('main')->plainTextToken;
        return response([
            'user' => new UserResource($user),
            'token' => $token
        ]);

    }

    /**
     * log out function
     */

    public function logout()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response('', 204);
    }

    /**
     * get user data function
     */

    public function getUser(Request $request): UserResource
    {
        return new UserResource(resource: $request->user());
    }

    public  function  getCurrentStore($id){
//        return CsUsersStore::where('user_id',Auth::user()->id)->get();
    }
}
