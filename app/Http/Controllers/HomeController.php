<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function index()
    {
        return view('home');
    }*/
    public function index()
    {
        $slideshow = Image::where('type', 'slideshow')->orderBy('position', 'asc')->get();

        $sponsors = [
            'images/sponsors/creative-market.jpg',
            'images/sponsors/designmodo.jpg',
            'images/sponsors/envato.jpg',
            'images/sponsors/themeforest.jpg',
        ];

        $tracks = Image::where('type', 'tracks')->orderBy('position', 'asc')->get();

        $whyJil = Image::where('type', 'whyJil')->orderBy('position', 'asc')->get();

        return view('home.main', compact('slideshow', 'sponsors', 'tracks', 'whyJil'));
    }
}
