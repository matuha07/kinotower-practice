<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    public function index(Request $request) {
        $countries = Country::all();
        return CountryResource::collection($countries);

    }

    public function show(int $id) {
        $country = Country::find($id);
        if (!$country) {
            return response()->json([
                'message' => 'Country not found',
            ]);
        }
        return response()->json(new Country($country));
    }
}
