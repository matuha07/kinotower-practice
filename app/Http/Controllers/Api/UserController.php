<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(Request $request) {
        $user = User::all();
        return UserResource::collection($user);
    }

    public function show(int $id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ]);
        }

        return response()->json(new UserResource($user));
    }
}
