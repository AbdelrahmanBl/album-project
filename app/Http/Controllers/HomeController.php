<?php

namespace App\Http\Controllers;

use App\Repositories\AlbumRepository;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $albums = (new AlbumRepository)->all();

        return view('home', compact('albums'));
    }
}
