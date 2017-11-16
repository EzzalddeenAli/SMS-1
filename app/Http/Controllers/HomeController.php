<?php

namespace App\Http\Controllers;

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
        $carousel = [
            'images/school/pexels-photo.jpg',
            'images/sports/badminton elem.png',
            'images/sports/football.png',
        ];

        $sponsors = [
            'images/sponsors/creative-market.jpg',
            'images/sponsors/designmodo.jpg',
            'images/sponsors/envato.jpg',
            'images/sponsors/themeforest.jpg',
        ];

        return view('home.main', compact('carousel', 'sponsors'));
    }
}
