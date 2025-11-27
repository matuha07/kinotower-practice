<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\FilmRequest;
use App\Models\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('admin.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.films.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmRequest $request)
    {
        $data = $request->validated();
        Film::create($data);
        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = film::findOrFail($id);
        return view('admin.films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = film::findOrFail($id);
        $countries = Country::all();
        return view('admin.films.create', compact('film', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilmRequest $request, string $id)
    {
        $data = $request->validated();
        $film = film::findOrFail($id);
        $film -> update($data);
        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Film::destroy($id);
        return redirect()->route('films.index');
    }
}
