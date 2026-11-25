<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;


class GameController extends Controller
{
    public function index()
    {
        $featured = Game::where('featured', true)->first();
        $topRated = Game::orderByDesc('rating')->limit(6)->get();
        if(!$featured) return null;
        /*
        $games = Game::query()
        ->when($request->query('category'), fn ($query, $id) =>
            $query->where('category_id', $id))
        ->get();
        /**/

        return view('home', ['games' => Game::all(), 'featured' => $featured]);
    }

    public function show(int $id)
    {
        return view('game-detail', ['game' => Game::findOrFail($id)]);
    }
}