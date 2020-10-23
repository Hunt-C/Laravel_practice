<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Home;
use App\Models\Models\Website;

class HomeController extends Controller
{
    //
    public function index ()
    {
        //...
        $home = Home::find(1);
        $website = Website::find(1);
        $ttt='ts';
        return view('frontend.index', compact('home', 'website','ttt'));
    }
}
