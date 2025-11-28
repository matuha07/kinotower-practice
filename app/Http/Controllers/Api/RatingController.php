<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RatingResource;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(int $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return RatingResource::collection(
            Rating::where('user_id', $userId)->get()
        );
    }

    public function show(int $userId, int $ratingId)
    {
        $rating = Rating::where('user_id', $userId)
            ->where('id', $ratingId)
            ->first();

        if (!$rating) {
            return response()->json(['message' => 'Rating not found'], 404);
        }

        return new RatingResource($rating);
    }

    public function store(Request $request, int $userId)
    {
        $request->validate([
            'film_id' => ['required', 'integer', 'exists:films,id'],
            'ball'  => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $rating = Rating::create([
            'user_id' => $userId,
            'film_id' => $request->film_id,
            'ball'  => $request->ball,
        ]);

        return (new RatingResource($rating))
            ->response()
            ->setStatusCode(201);
    }
}
