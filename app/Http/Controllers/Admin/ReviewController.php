<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve(int $id){
        $review = Review::findOrFail($id);
        $review->update(['is_approved' => 1]);
        return redirect()->route('reviews.index');
    }

    public function reject(int $id){
        $review = Review::findOrFail($id);
        $review->update(['is_approved' => 0]);
        return redirect()->route('reviews.index');
    }

    public function destroy(int $id){
        Review::destroy($id);
        return redirect()->route('reviews.index');    }
}
