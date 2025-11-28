<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(int $userId)
    {
        $reviews = Review::where('user_id', $userId)->get();

        return response()->json([
            'reviews' => ReviewResource::collection($reviews)
        ]);
    }

    public function show(int $userId, int $reviewId)
    {
        $review = Review::where('user_id', $userId)
            ->where('id', $reviewId)
            ->first();

        if (!$review) {
            return response()->json([
                'message' => 'Review not found',
            ], 404);
        }

        return new ReviewResource($review);
    }
}
