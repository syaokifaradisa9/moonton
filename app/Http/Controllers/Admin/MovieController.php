<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Inertia\Inertia;
use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Movie\Store;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\Movie\Update;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return inertia('Admin/Movie/Index', [
            'movies' => $movies
        ]);
    }

    public function create()
    {
        return inertia('Admin/Movie/Create');
    }


    public function store(Store $request)
    {
        $data = $request->validated();
        $data['thumbnail'] = Storage::disk('public')->put('movies', $request->file('thumbnail'));
        $data['slug'] = Str::slug($data['name']);

        Movie::create($data);

        session(['message' => 'Movie inserted successfully']);
        session(['type' => 'success']);

        return Inertia::location(route('admin.dashboard.movie.index'));
    }

    public function show(Movie $movie)
    {
        //
    }

    public function edit(Movie $movie)
    {
        return inertia('Admin/Movie/Edit', [
            'movie' => $movie
        ]);
    }

    public function update(Update $request, Movie $movie)
    {
        $data = $request->validated();
        if($request->file('thumbnail')){
            $data['thumbnail'] = Storage::disk('public')->put('movies', $request->file('thumbnail'));
            Storage::disk("public")->delete($movie->thumbnail);
        }else{
            $data['thumbnail'] = $movie->thumbnail;
        }

        $data['slug'] = Str::slug($data['name']);
        $movie->update($data);

        session(['message' => 'Movie updated successfully']);
        session(['type' => 'success']);

        return Inertia::location(route('admin.dashboard.movie.index'));
    }

    public function destroy(Movie $movie)
    {
        //
    }
}
