<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\About;
use App\Models\Models\Website;

class AboutController extends Controller
{
    //
    public function index ()
    {
        //...
        $about = About::find(1);
        $website = Website::find(1);
        return view('frontend.about', compact('about', 'website'));
    }
}
