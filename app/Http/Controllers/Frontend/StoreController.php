<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Store;
use App\Models\Models\Website;
use App\Models\Models\About;

class StoreController extends Controller
{
    //
    public function index ()
    {
        //...
        $store = Store::find(1);
        $website = Website::find(1);
        $about = About::find(1);

        if ($store == null) {
            // User not found, show 404 or whatever you want to do
            // example:
            //return View('admin.user.notFound', [], 404);
            echo("<script>alert('JSwindow: =_=!')</script>");
            //echo("<script>window.location = 'index.php?page=hero.php';</script>");
        }
        else {
            //echo date('g:i A', strtotime($store->sun_open));
        }
        return view('frontend.store', compact('store', 'website', 'about'));
    }
}
