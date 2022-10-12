<?php

namespace App\Http\Controllers;

use App\Repositories\AlbumRepository;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = (new AlbumRepository)->all();

        return view('home', compact('albums'));
    }
}
