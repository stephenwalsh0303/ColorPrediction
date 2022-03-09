<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function statisticdata() {
        return view('HomePage.statisticdata');
    }
}
