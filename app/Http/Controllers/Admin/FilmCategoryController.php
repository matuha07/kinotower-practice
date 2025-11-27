<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmCategoryController extends Controller
{
    public function index(int $idFilm) {
        $film = Film::findOrFail($idFilm);
        $categories = Category::all();
        return view('admin.films.categories', compact('film', 'categories'));
    }

    public function save(Request $request, int $idFilm) {
        $data = $request->validate(['categories' => 'nullable|array']);
        $film = Film::findOrFail($idFilm);
        $film->categories()->sync($data['categories']);

        return redirect()->route('films.index');

    }
}
