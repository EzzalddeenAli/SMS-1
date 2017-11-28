<?php

namespace App\Http\Controllers;

use App\Layout;
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
/*        $carousel = [
            'images/school/pexels-photo.jpg',
            'images/sports/badminton elem.png',
            'images/sports/football.png',
        ];*/

        $slideshow = Layout::where('type', 'slideshow')->orderBy('position', 'asc')->get();

        $sponsors = [
            'images/sponsors/creative-market.jpg',
            'images/sponsors/designmodo.jpg',
            'images/sponsors/envato.jpg',
            'images/sponsors/themeforest.jpg',
        ];

        $tracks = [
            'Stem' => 'images/tracks/stem.jpg',
            'Abm' => 'images/tracks/abm.jpg',
            'Ict' => 'images/tracks/ict.jpg',
            'Stems' => 'images/tracks/stem.jpg',
            'Abms' => 'images/tracks/abm.jpg',
            'Icts' => 'images/tracks/ict.jpg',
        ];

        return view('home.main', compact('slideshow', 'sponsors', 'tracks'));
    }
}
