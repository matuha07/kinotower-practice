<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    public function index(int $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $reviews = Review::where('user_id', $userId)->get();

        return response()->json([
            'reviews' => ReviewResource::collection($reviews),
        ]);
    }

    public function show(int $userId, int $reviewId)
    {
        $review = Review::where('user_id', $userId)
            ->where('id', $reviewId)
            ->first();

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return new ReviewResource($review);
    }

    public function store(StoreReviewRequest $request, int $userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $review = Review::create([
            'user_id'     => $userId,
            'film_id'     => $request->film_id,
            'message'     => $request->message,
            'is_approved' => 0,
        ]);

        return (new ReviewResource($review))
            ->response()
            ->setStatusCode(201);
    }

    public function destroy(int $userId, int $reviewId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $review = Review::where('user_id', $userId)
            ->where('id', $reviewId)
            ->first();

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->noContent();
    }
}
