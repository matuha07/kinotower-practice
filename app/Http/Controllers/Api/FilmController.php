<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request){
        $filmQuery = Film::query();
        $page = $request->query('page', 1);
        $size = $request->query('size', 10);
        $sortBy = $request->query('sortBy', 'name');
        $sortDir = $request->query('sortDir', 'asc');
        $sortDir = in_array($sortDir, ['asc', 'desc']) ? $sortDir : "asc";

        if ($sortBy == 'name') {
            $filmQuery->orderBy($sortBy, $sortDir);
        }elseif ($sortBy == 'year') {
            $filmQuery->orderBy('year', $sortDir);
        }elseif($sortBy == 'rating') {
            $filmQuery->ratings()->withAvg('ball')->orderBy('ratings_avg_ball', $sortDir);
        }

        if ($request->has('country')) {
            $filmQuery->where('country_id', $request->query('country'));
        }

        if ($request->has('category')) {
            $filmQuery->withWhereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->query('category'));
            });
        }
        if ($request->has('search')) {
            $filmQuery->where('name', 'like', '%' . $request->query('search') . '%');
        }

        $films = $filmQuery->paginate($size, ['*'], 'page', $page);

        return [
            'films' => filmResource::collection($films),
            'size' => $films->perPage(),
            'total' => $films->total(),
            'page' => $films->currentPage(),
        ];

    }

    public function show(int $id) {
        $film = Film::find($id);
        if (!$film) {
            return response()->json([
                'message' => 'Film not found',
            ]);
        }
        return response()->json(new FilmResource($film));
    }


}
