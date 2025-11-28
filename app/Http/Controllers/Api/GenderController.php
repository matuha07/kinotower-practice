<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;
use App\Http\Resources\GenderResource;

class GenderController extends Controller
{
    public function index() {
        $categories = Gender::all();
        return GenderResource::collection($categories);
    }
}
