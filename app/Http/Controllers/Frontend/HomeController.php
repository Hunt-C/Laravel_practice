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
        //$website = Website::findOrFail(1);
        $ttt='ts';
        if ($website == null) {
            // User not found, show 404 or whatever you want to do
            // example:
            //return View('admin.user.notFound', [], 404);
            echo("<script>alert('JSwindow: =_=!')</script>");
            //echo("<script>window.location = 'index.php?page=hero.php';</script>");
        }

        return view('frontend.index', compact('home', 'website','ttt'));
    }
}
